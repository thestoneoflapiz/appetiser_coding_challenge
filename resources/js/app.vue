<template>
    <div>
        <div class="row">
            <div class="col-sm-5">
                <Form 
                    v-on:eventrefresh="getEvents(), getThisMonthDays()"
                />
            </div>
            <div class="col-sm-7">
                <Calendar :this_month_days="this_month_days" :events="events" />
            </div>
        </div>
    </div>
</template>

<script>

import Form from "./components/form.vue";
import Calendar from "./components/calendar.vue";

export default {
    computed: {},
    data() {
        return{
           events: [],
           this_month_days: [],
        }
    },
    components:{
        Form, Calendar
    },
    methods: {
        getEvents(){
            this.events = [];
            
            axios.get("api/events")
            .then(response => {
                this.events = response.data[0];
            })
            .catch(err => console.log(err));
        },
        getThisMonthDays(){
            this.this_month_days = [];

            axios.get("api/month/days")
            .then(response => {
                this.this_month_days = response.data[0];
            })
            .catch(err => console.log(err));
        }
    },
    created(){
        this.getEvents();
        this.getThisMonthDays();
    }
}
</script>