<template>
    <div>
        <div :class="[details.date == date.date_ ? 'event-notice' : '', 'row date-beautify']">
            <div class="col">
                <span class="title-date">{{ date.day_string }}</span><span class="event-name">{{ details.name }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DateDetails",
    props: ["events", "date"],
    data(){
        return {
            details: {
                name: "",
                date: "",
            },
        }
    },
    created(){
        for (let i = 0; i < this.$props.events.length; i++) {
            const event = this.$props.events[i];
            if(event.event_date == this.$props.date.date_){
                this.details.name = event.event;
                this.details.date = event.event_date;

                break;
            }else{
                this.details.name = "";
                this.details.date = "";
            }
        }
    }
}
</script>

<style scoped>
.date-beautify{
    border: 1px solid #e3e3e3;
    padding: 10px;
}
.title-date{
    font-weight: 700;
    font-size: 1.2rem;
    margin-right: 15px;
}
.event-name{
    font-size: 0.9rem;
    float: right;
}
.event-notice{
    background:#d4ffc6;
}
</style>