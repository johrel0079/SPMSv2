<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Picking Ticket Distribution</h5>   
                <b-row class="mt-5">
                    <b-col cols="2">
                        <label for="picker-id">Picker ID No.:</label>
                    </b-col>
                    <b-col cols="3">
                        <multiselect 
                            id="picker_id" 
                            v-model="picker_id"
                            name="picker_id"
                            :options="picker_options" 
                            :searchable="true"
                            :show-labels="false"
                            placeholder='Picker ID No'
                            label="name" 
                            track-by="id"></multiselect>
                    </b-col>
                </b-row>  
                <b-row class="mt-3">
                    <b-col cols="2">
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
                        :items="distribution_list"
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
                    <b-col cols="6">
                        <label for="total-ticket">Total Ticket:</label>
                    </b-col>
                    <b-col cols="6">
                        <label for="total-qty">Total Qty:</label>
                    </b-col>
                </b-row>

                <b-row class="mt-5">
                    <b-col cols="3">
                        <b-button
                            variant="primary"
                            class="mt-1"
                            id="button-save"
                            type="submit"
                            title="Click to Save">Save
                        </b-button>
                        <b-button
                            variant="danger"
                            class="mt-1"
                            id="button-clear"
                            type="submit"
                            title="Click to Clear">Clear
                        </b-button>
                    </b-col>
                    <b-col cols="9">
                        <b-button
                            style="float:right"
                            variant="success"
                            class="mt-1"
                            id="button-change-picker"
                            type="submit"
                            title="Click to Change Picker">Change Picker
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
            picker_id: '',
            barcode: '',
            fields: [
            {
                key: 'no',
                sortable: true
            },
            {
                key: 'part_number',
                sortable: true
            },
            {
                key: 'destination',
                sortable: true
            },
            {
                key: 'barcode',
                sortable: true
            },
            {
                key: 'quantity',
                sortable: true
            },
            ],
            distribution_list: [],
            picker_options: [
                { name: 'Juan dela Cruz', id: '000001' },
                { name: 'Juana dela Cruz', id: '000002' },
            ]
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