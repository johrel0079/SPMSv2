<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Ticket Issuances</h5>
                <b-row class="mt-3">
                    <b-col cols="3">
                        <b-button
                            variant="primary" 
                            size="sm" 
                            class="mt-1"
                            id="batch-printing"
                            type="submit"
                            title="Click for batch printing"
                            @click="batchPrinting()">
                            Batch Printing
                        </b-button>
                    </b-col>
                </b-row> 

                <b-card class="mt-3">
                    <table-component    
                        :fields="fields"
                        :items="for_issue_list"
                        :perPage="10"
                        :rows="5"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :is_select= "true">
                        </table-component>
                </b-card>  
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
                key: 'whe',
                sortable: true
            },
            {
                key: 'issued_date',
                sortable: true
            },
            {
                key: 'item',
                sortable: true
            },
            {
                key: 'barcode',
                sortable: true
            },
            {
                key: 'control',
                sortable: true
            },
            {
                key: 'destination_name',
                sortable: true
            },
            {
                key: 'payee_code',
                sortable: true
            },
            {
                key: 'with_ticket',
                sortable: true
            },
            ],
            for_issue_list: [{
                whe: 'C3',
                issued_date: '06/06/2022',
                item: 'KD03869-Y124',
                barcode: 'MM4P1395701',
                control: 'C3-PML-22-0001',
                destination_name: 'SRU (SGIC-LAG)',
                payee_code: '90000209207'
            }],
        };
       
    },
    mounted(){
       
    },
    methods: {
       batchPrinting()
       {
           alert(1)
       }
    }
}
</script>

<style scoped>

</style>