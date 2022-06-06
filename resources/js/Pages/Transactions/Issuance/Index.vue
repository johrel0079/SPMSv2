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
                        :stickyColumn="false"
                        :flag="'issuance'"
                        :fields="fields"
                        :items="issuance_list"
                        :perPage="10"
                        :rows="5"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :is_select= "true"
                        @selectData="getSelected">
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
                key: 'select',
                label: 'With Ticket'
            },
            {
                key: 'control_no',
                sortable: true
            },
            {
                key: 'delivery_date',
                sortable: true
            },
            {
                key: 'destination',
                sortable: true
            },
            {
                key: 'issuance_date',
                sortable: true
            },
            ],
            issuance_list: [],
            selected_list: []
        };
       
    },
    mounted(){
    this.getList();
    },
    methods: {
        getList(){
            this.$http.get('api/load-ticket-issuance')
                .then((response) => {
                    this.issuance_list = response.data.data
                    console.log(response);
                 })
                .catch((error) => {
                    this.toast.error("Something went wrong");
                    console.log(error);
                })
                .finally(() => {
                });
        },
        getSelected(value){
            this.selected_list = value;
        },
       batchPrinting()
       {
           alert(1)
       }
    }
}
</script>

<style scoped>

</style>