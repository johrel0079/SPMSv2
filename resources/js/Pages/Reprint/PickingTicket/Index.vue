<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Reprint Picking Ticket</h5> 
                    <b-row class="mt-3">
                        <b-col cols="3">
                            <label for="date-from">Date From:</label>
                            <b-form-datepicker 
                                id="date-from"
                                placeholder="Select Date From"
                                class="datepicker"
                                hide-header
                                reset-button
                                close-button
                                v-model="date_from"
                                :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric'}">
                            </b-form-datepicker>
                        </b-col>
                        <b-col cols="3">
                            <label for="date-to">Date To:</label>
                            <b-form-datepicker 
                                id="date-to"
                                placeholder="Select Date To"
                                class="datepicker"
                                hide-header
                                reset-button
                                close-button
                                v-model="date_to"
                                :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric'}">
                            </b-form-datepicker>
                        </b-col>
                        <b-col cols="3">
                            <b-button
                                variant="primary"
                                class="mt-4"
                                id="button-search"
                                type="submit"
                                title="Click to Search">Search
                            </b-button>
                        </b-col>
                    </b-row>  
                    <b-card class="mt-3">
                    <table-component    
                        :stickyColumn="true"
                        :fields="fields"
                        :items="picking_ticket_list"
                        :perPage="perPage"
                        :rows="rows"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :is_select= "false"
                        >
                    </table-component> 
                    </b-card>
                    <b-row class="mt-3">
                    <b-col>
                        <b-button
                            style="float:right"
                            variant="primary"
                            class="mt-1"
                            id="button-reprint"
                            type="submit"
                            title="Click to Print">Print
                        </b-button>
                    </b-col>
                </b-row>
                    

            </div>
        </div>
    </div>
</div>

</template>

<script>
export default 
{
    data(){
        return {
            picking_ticket_list: [],
            fields: [
            {
                key: 'select',
                sortable: true
            },
            {
                key: 'control_no',
                sortable: true
            },
            {
                key: 'action',
                sortable: true
            },
            ],
        };
    },
    computed:{

    },
    mounted(){
       
    },
    methods: {

    }
}
</script>

<style scoped>

</style>