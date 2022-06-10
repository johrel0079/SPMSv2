<template>
    <div class="page-content ">
        <div class="bg-color">
            <nav-bar />
            <div class="mb-4">
                <div class="container px-3">
                    <h5 class="mt-3">Dashboard</h5> 
                    <b-row class="mt-3">
                        <b-col cols="4">
                            <b-card class="mt-3">
                                <h6>Ticket Tracker</h6>
                                <b-row class="mt-3">
                                    <b-col cols="8">
                                        <!-- <small><label for="ticket_number">Ticket Number:</label></small> -->
                                        <b-form-input
                                            id="ticket_number"
                                            v-model="ticket_number"
                                            placeholder="Ticket Number"
                                            required
                                        ></b-form-input>
                                    </b-col>
                                    <b-col cols="4">
                                         <b-button
                                            variant="primary"
                                            id="button-search-ticket"
                                            type="submit"
                                            title="Click to Search">Search
                                        </b-button>
                                    </b-col>
                                </b-row>
                                <b-row class="mt-3">
                                    <div id="div_track_default">
                                        <label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;No results found.
                                        </label>
                                        <img src="assets/image/searching.png" style="height:50%; width:90%; margin-top: 5rem; ">
                                        <!-- <center>
                                            <img src="../public/image/searching.png" width="75%">
                                        </center> -->
                                    </div>
                                </b-row>
                            </b-card>
                        </b-col>
                        <b-col cols="8">
                            <b-card class="mt-3">
                                <h6>Warehouse<small> Status Report</small></h6>
                                <b-row>
                                    <b-col cols="4">
                                        <small><label for="area-code">Area Code:</label></small>
                                        <multiselect 
                                            id="area_code" 
                                            v-model="area_code"
                                            name="area_code"
                                            :options="area_code_options" 
                                            :searchable="true"
                                            :show-labels="false"
                                            placeholder='Area Code'
                                            label="name" 
                                            track-by="id"></multiselect>
                                    </b-col>
                                    <b-col cols="4">
                                        <small><label for="date-from">Date From:</label></small>
                                        <b-form-datepicker 
                                            id="date-from"
                                            placeholder="From"
                                            class="datepicker"
                                            hide-header
                                            reset-button
                                            close-button
                                            v-model="date_from"
                                            :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric'}">
                                        </b-form-datepicker>
                                    </b-col>
                                    <b-col cols="4">
                                        <small><label for="date-to">Date To:</label></small>
                                        <b-form-datepicker 
                                            id="date-to"
                                            placeholder="To"
                                            class="datepicker"
                                            hide-header
                                            reset-button
                                            close-button
                                            v-model="date_to"
                                            :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric'}">
                                        </b-form-datepicker>
                                    </b-col>
                                </b-row>
                                <b-row>
                                     
                                </b-row>
                                <b-row>
                                    <vue-chart type="doughnut" :data="doughnutData" ></vue-chart>
                                </b-row>
                            </b-card>
                        </b-col>
                    </b-row>
                    <b-row class="mt-1">
                        <b-col>
                           <b-card class="mt-3">
                                <h6>Delivery Status (Count)</h6>
                                 <table-component    
                                    :stickyColumn="true"
                                    :fields="fields"
                                    :items="delivery_status_list"
                                    :perPage="perPage"
                                    :rows="rows"
                                    :status="''"
                                    :action_dropdown="true"
                                    :is_search="true"
                                    :is_select= "false"
                                    :flag="'delivery_status_count'"
                                    >
                                </table-component> 
                            </b-card>
                        </b-col> 
                    </b-row>
                    <b-row class="mt-1">
                        <b-col>
                           <b-card class="mt-3">
                                <h6>Warehouse Ticket Issuance</h6>
                                <vue-chart type="bar" :data="barChartData"></vue-chart>
                            </b-card>
                        </b-col> 
                    </b-row>
                </div>
            </div>
        </div>
        
    </div>

</template>

<script>
export default {
    data(){
        return{
            ticket_number: '',
            date_from: '',
            date_to: '',
            perPage: 10,
            rows: 10,
            area_code_options: [
                {id: '1', name: 'C1'},
                {id: '2', name: 'C2'},
            ],
            area_code: [],
            doughnutData: {
                labels: ["WIP", "Delivered"],
                datasets: [{
                    borderWidth: 1,
                    backgroundColor: ['#00c0ef', '#3c8dbc'],
                    data: [23.4, 76.6]
                    }]
            },
            barChartData: {
                labels: ["2022-06-06", "2022-06-07", "2022-06-08", "2022-06-09", "2022-06-10"],
                datasets: [{
                label: 'Bar Chart',
                backgroundColor: [
                '#00c0ef',
                '#00c0ef',
                '#00c0ef',
                '#00c0ef',
                '#00c0ef'
                ],
                pointBorderColor: '#2554FF',
                data: [982, 1250, 1525, 875, 1415]
                }]
            },
            delivery_status_list: [
                {'process': 'For Issuance', '2022-06-06': '0', '2022-06-07': '0', '2022-06-08': '0', '2022-06-09': '0', '2022-06-10': '100', 'Total': '100'},
                {'process': 'For Distribution', '2022-06-06': '0', '2022-06-07': '0', '2022-06-08': '0', '2022-06-09': '0', '2022-06-10': '817', 'Total': '817'},
                {'process': 'For Picking', '2022-06-06': '0', '2022-06-07': '0', '2022-06-08': '0', '2022-06-09': '0', '2022-06-10': '390', 'Total': '390'},
                {'process': 'For Checking', '2022-06-06': '0', '2022-06-07': '0', '2022-06-08': '0', '2022-06-09': '525', '2022-06-10': '58', 'Total': '583'},
                {'process': 'For DR', '2022-06-06': '0', '2022-06-07': '0', '2022-06-08': '0', '2022-06-09': '300', '2022-06-10': '50', 'Total': '350'},
                {'process': 'For Delivery', '2022-06-06': '982', '2022-06-07': '1250', '2022-06-08': '1525', '2022-06-09': '50', '2022-06-10': '0', 'Total': '3807'},
                {'process': 'Total', '2022-06-06': '982', '2022-06-07': '1250', '2022-06-08': '1525', '2022-06-09': '875', '2022-06-10': '1415', 'Total': '6047'},
           ],
            fields: [
            {
                key: 'process',
                sortable: true
            },
            {
                key: '2022-06-06',
                sortable: true
            },
            {
                key: '2022-06-07',
                sortable: true
            },
            {
                key: '2022-06-08',
                sortable: true
            },
            {
                key: '2022-06-09',
                sortable: true
            },
            {
                key: '2022-06-10',
                sortable: true
            },
            {
                key: 'Total',
                sortable: true
            },
            ],
        }
    },
}
</script>