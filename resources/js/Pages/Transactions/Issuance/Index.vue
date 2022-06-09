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
                        :perPage="perPage"
                        :rows="rows"
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
                key: 'ticket_no',
                label: 'Barcode'
            },
            {
                label: 'Control No',
                key: 'order_download_no',
                sortable: true
            },
            {
                label: 'Delivery Date',
                key: 'delivery_inst_date',
                sortable: true
            },
            {
                label: 'Destination',
                key: 'destination_code',
                sortable: true
            },
            {
                label: 'Issuance Date',
                key: 'ticket_issue_date',
                sortable: true
            },
            ],
            issuance_list: [],
            selected_list: [],
            //pagination
            perPage: 10,
        };
       
    },
    computed:{
        rows(){
            if(!this.issuance_list){
                return 1;
            } else {
                return this.issuance_list.length;
            }
        }
    },
    mounted(){
    this.getList();
    },
    methods: {
        getList(){
            this.$http.get('api/load-ticket-issuance/1')
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
            console.log(value);
        },
       batchPrinting()
       {
            let select_id = [];
           this.selected_list.forEach(selected => {
               select_id.push(selected.id);
           });
        //    
           let data = {
               master_data_id : select_id
           }
           console.log(data);
           this.$http.post('api/issuance', data)
                .then((response) => {
                    console.log(response);
                    this.getList();
                }).catch((response) => {
                    console.log(response);
                })
       }
    }
}
</script>

<style scoped>

</style>