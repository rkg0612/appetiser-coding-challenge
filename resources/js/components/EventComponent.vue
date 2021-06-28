<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-bordered block-rounded block-fx-pop">
                <div class="block-header block-header-default">
                    <h3 class="block-title font-w700">
                        Calendar
                    </h3>
                </div>
                <div class="block-content mb-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Event</label>
                                <input type="text" class="form-control" v-model="event.name">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input type="date" class="form-control" v-model="event.start_date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="date" class="form-control" :disabled="!event.start_date" v-model="event.end_date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-auto">
                                    <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                        <input type="checkbox" id="Monday" class="custom-control-input" value="Monday" v-model="event.days_of_week">
                                        <label for="Monday" class="custom-control-label">Mon</label>
                                    </div>
                                </div>
                                <div class="col-lg-auto">
                                    <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                        <input type="checkbox" id="Tuesday" class="custom-control-input" value="Tuesday" v-model="event.days_of_week">
                                        <label for="Tuesday" class="custom-control-label">Tue</label>
                                    </div>
                                </div>
                                <div class="col-lg-auto">
                                    <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                        <input type="checkbox" id="Wednesday" class="custom-control-input" value="Wednesday" v-model="event.days_of_week">
                                        <label for="Wednesday" class="custom-control-label">Wed</label>
                                    </div>
                                </div>
                                <div class="col-lg-auto">
                                    <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                        <input type="checkbox" id="Thursday" class="custom-control-input" value="Thursday" v-model="event.days_of_week">
                                        <label for="Thursday" class="custom-control-label">Thu</label>
                                    </div>
                                </div>
                                <div class="col-lg-auto">
                                    <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                        <input type="checkbox" id="Friday" class="custom-control-input" value="Friday" v-model="event.days_of_week">
                                        <label for="Friday" class="custom-control-label">Fri</label>
                                    </div>
                                </div>
                                <div class="col-lg-auto">
                                    <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                        <input type="checkbox" id="Saturday" class="custom-control-input" value="Saturday" v-model="event.days_of_week">
                                        <label for="Saturday" class="custom-control-label">Sat</label>
                                    </div>
                                </div>
                                <div class="col-lg-auto">
                                    <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                        <input type="checkbox" id="Sunday" class="custom-control-input" value="Sunday" v-model="event.days_of_week">
                                        <label for="Sunday" class="custom-control-label">Sun</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="button" @click="save"><i class="fa fa-save fa-fw mr-1"></i>Save</button>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h3 class="content-heading mb-0">{{ this.event_data.date_range }}</h3>
                            <template v-if="this.event_data.dates.length > 0">
                                <ul class="list-unstyled">
                                    <li v-for="ev in this.event_data.dates" class="row py-2" :class="ev.has_event ? 'bg-success-op' : 'bg-transparent'">
                                        <div class="col-2">{{ ev.date }}</div>
                                        <div class="col-auto">{{ ev.name }}</div>
                                    </li>
                                </ul>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                event: {
                    name: null,
                    start_date: null,
                    end_date: null,
                    days_of_week: [],
                },
                event_data: {
                    date_range: null,
                    dates: []
                }
            }
        },
        watch: {
            'event.end_date' (newVal, oldVal)
            {
                if(this.event.start_date >= newVal){
                    this.event.end_date = null;
                    dashmixAjxNotify('error', 'End date cannot be the same or less than the start date');
                }
            }
        },
        computed: {
            isValid() {
                return this.event.name && this.event.start_date && this.event.end_date && this.event.days_of_week.length > 0;
            }
        },
        mounted() {
            this.init();
        },
        methods: {
            init() {
                axios.get('/get-events')
                .then((res) => {
                    this.event_data = res.data.event_data;
                });
            },
            save() {
                if(this.isValid){
                    LoadingBlockUI();
                    axios.post('/save-events', this.event)
                    .then((res) => {
                        dashmixAjxNotify(res.data.status, res.data.message);
                    })
                    .finally(() => {
                        this.init();
                        LoadingUnblockUI();
                    });
                }else{
                    dashmixAjxNotify('error', 'Please fill up all fields!');
                }
            }
        }
    }
</script>

<style>
li {
    border-bottom: 1px solid #e6ebf4;
}

li > ul {
    border-top: 1px solid #e6ebf4;
}

li > ul > li:last-child {
    border: none;
}
</style>