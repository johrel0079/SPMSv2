<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Checking and Palletizing</h5>   
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
                        :items="checking_list"
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
            barcode: '',
            fields: [
            {
                key: 'barcode',
                sortable: true
            },
            {
                key: 'part_number',
                sortable: true
            },
            {
                key: 'quantity',
                sortable: true
            },
            {
                key: 'order_download_no',
                sortable: true
            },
            {
                key: 'process',
                sortable: true
            },
            ],
            checking_list: [],
            
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