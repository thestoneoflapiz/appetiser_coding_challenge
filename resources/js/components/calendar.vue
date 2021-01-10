<template>
    <div>
        <div class="container calender-box">
            <h3>January 2021</h3>
            <DateDetails v-for="(date, index) in this_month_days" :key="index" :events="events" :date="date" />
        </div>
    </div>
</template>

<script>
import DateDetails from "./date_details.vue";
export default {
    props: ["events", "this_month_days"],
    components: {
        DateDetails
    },
}
</script>