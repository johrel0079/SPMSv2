<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Picking</h5>     
                <!-- <b-row class="mt-3">
                    <b-col cols="3">
                        <label for="date-from">Date From:</label>
                        <b-form-datepicker 
                            id="date-from"
                            placeholder="Date From"
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
                            placeholder="Date To"
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
                </b-row>   -->

                <b-row class="mt-3">
                    <b-col cols="1">
                        <label for="barcode">Barcode:</label>
                    </b-col>
                    <b-col cols="3">
                        <b-form-input
                            id="barcode"
                            v-model="barcode"
                            placeholder="Barcode"
                            required
                        ></b-form-input>
                    </b-col>
                </b-row>
                <b-card class="mt-3">
                    <table-component    
                        :stickyColumn="true"
                        :fields="fields"
                        :items="picking_list"
                        :perPage="10"
                        :rows="5"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :is_select= "false"
                        >
                    </table-component>
                </b-card>
                <b-row class="mt-3">
                    <b-col>
                        <label for="finish-count">Finished Count:</label>  {{ finish_count}}
                        <b-button
                            style="float:right"
                            variant="primary"
                            class="mt-1"
                            id="button-finished"
                            type="submit"
                            title="Click to Finished">Finished
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
            fields: [
            {
                key: 'no',
                sortable: true
            },
            {
                key: 'issued_date',
                sortable: true
            },
            {
                key: 'account_number',
                sortable: true
            },
            {
                key: 'picker_name',
                sortable: true
            },
            {
                key: 'ticket_count',
                sortable: true
            },
            {
                key: 'finished_count',
                sortable: true
            },
            {
                key: 'returned_ticket',
                sortable: true
            },
            {
                key: 'date_barcoded',
                sortable: true
            },
            ],
            picking_list: [],
            barcode: '',
            finish_count: '5'
        };
       
    },
    mounted(){
       
    },
    methods: {
       
    }
}
</script>

<style scoped>
</style>