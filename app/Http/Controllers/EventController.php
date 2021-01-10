<?php

namespace App\Http\Controllers;

use Illuminate\Http\{
    Request, JsonResponse
};
use App\Models\Event;
use DatePeriod;
use DateTime;
use DateInterval;

class EventController extends Controller
{
    function list(Request $request) : JsonResponse
    {
        $events = Event::all();
        return response()->json([ $events ]);
    }

    function list_month_days(Request $request) : JsonResponse
    {
        $days = [];
        if($request->has("month")){
            $month = $request->month;
        }else{
            $month = date("m");
        }

        $start_date = date("Y-{$month}-01");
        $period = new DatePeriod(
            new DateTime($start_date),
            new DateInterval('P1D'),
            new DateTime($start_date." +1 month")
        );

        foreach($period as $key => $date_){
            $days[] = [
                "day_string" => $date_->format("d, D"),
                "date_" => $date_->format("Y-m-d"),
            ];
        }

        return response()->json([ $days ]);
    }

    function store(Request $request) : JsonResponse
    {
        $data = $request->validate([
            "event" => ["required", "max:255"],
            "event_daterange" => ["required"]
        ]);

        $period = new DatePeriod(
            new DateTime($data["event_daterange"]["start"]." +1 day"),
            new DateInterval('P1D'),
            new DateTime($data["event_daterange"]["end"])
        );

        $add_to_events = [];
        foreach ($period as $key => $selected_date) {
            $number_week = $selected_date->format('w');
            $is_day_selected = array_filter($request->days, function($day) use($number_week){
                if($day["day"] == $number_week && $day["checked"]){
                    return $day;
                }
            });
            
            if(count($is_day_selected) > 0){
                $add_to_events[] = [
                    "event" => $request->event,
                    "event_date" => $selected_date->format("Y-m-d")
                ];
            }
        }

        if(count($add_to_events) > 0){
            Event::truncate();
            Event::insert($add_to_events);
        }

        return response()->json([]);
    }
}
