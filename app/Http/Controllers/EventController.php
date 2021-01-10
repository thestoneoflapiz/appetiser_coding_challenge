<?php

namespace App\Http\Controllers;

use Illuminate\Http\{
    Request, JsonResponse
};
use App\Models\Event;

class EventController extends Controller
{
    function list(Request $request) : JsonResponse
    {
        $events = Event::all();
        return response()->json([ $events ]);
    }

    function store(Request $request) : JsonResponse
    {
        $data = $request->validate([
            "event" => ["required", "max:255"],
            "event_daterange" => ["required"]
        ]);

        return response()->json([ ], 400);
    }
}
