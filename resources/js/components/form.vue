<template>
    <div>
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <h5 class="error-msg" v-if="error!=''">{{ error }}</h5>
            </div>
            <div class="col-xl-12 col-sm-12">
                <form>
                    <div class="mb-3 row">
                        <div class="col-xl-12 col-sm-12">
                            <input type="text" class="form-control form-control-sm" placeholder="Event" name="event" v-model="event">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <DatePicker is-range v-model="event_daterange" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-xl-4 col-md-4 col-sm-4" v-for="(day, index) in days" :key="index">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" :id="day.day" name="days[]" v-model="day.checked">
                                <label class="form-check-label" :for="day.day">
                                    {{ day.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-xl-4 col-sm-5">
                            <button v-on:click="submitEvent" class="btn btn-success btn-sm">Save Event</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import DatePicker from 'v-calendar/lib/components/date-picker.umd'

export default {
    data(){
        return {
            event: "",
            event_daterange: null,
            days: [
                {
                    day: 1,
                    name: "Mon",
                    checked: true,
                },
                {
                    day: 2,
                    name: "Tue",
                    checked: false,
                },
                {
                    day: 3,
                    name: "Wed",
                    checked: false,
                },
                {
                    day: 4,
                    name: "Thu",
                    checked: false,
                },
                {
                    day: 5,
                    name: "Fri",
                    checked: false,
                },
                {
                    day: 6,
                    name: "Sat",
                    checked: false,
                },
                {
                    day: 7,
                    name: "Sun",
                    checked: false,
                }
            ],
            error: "",
        }
    },
    components:{
        DatePicker
    },
    methods: {
        submitEvent(e) {
            e.preventDefault();
            if(
                this.event=="" ||
                this.event_daterange == null
            ){
                this.error = "Please complete event details!";
                return;
            }

            this.error = "";

            axios.post("api/events/store",{
                event: this.event,
                event_daterange: this.event_daterange,
                days: this.days,
            }).then(response => {
                if(response.status == 200 || response.status == 201){

                    this.event = "";
                    this.event_daterange = null;

                    this.$emit("eventrefresh");
                }
            })
            .catch(err => {
                this.error = "Unable to save event! Please try again later.";
                console.log(err);
            });
        }
    }
}
</script>

<style scoped>
.error-msg{
    font-size: 15px;
    color: red;
}
</style>