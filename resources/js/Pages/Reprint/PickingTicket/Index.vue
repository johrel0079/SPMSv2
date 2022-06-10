<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Reprint Picking Ticket</h5> 
                    <!-- <b-row class="mt-3">
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
                    </b-row>   -->
                    <b-card class="mt-3">
                    <table-component    
                        :stickyColumn="false"
                        :fields="fields"
                        :items="picking_ticket_list"
                        :perPage="perPage"
                        :rows="rows"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :is_select= "true"
                        :flag="'picking_ticket'"
                        @selectData="getSelected">
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
                            title="Click to Print"
                            @click="reprintPickingTicket()">Print
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
                key: 'order_download_no',
                sortable: true,
                label: 'Control No'
            },
            {
                key: 'item_no',
                sortable: true,
            },
            {
                key: 'ticket_no',
                sortable: true,
                label: 'Barcode'
            },
            // {
            //     key: 'action',
            //     sortable: true
            // },
            ],
             perPage: 10,
             date_from: '',
             date_to: '',
        };
    },
    computed:{
        rows(){
            if(!this.picking_ticket_list){
                return 1;
            } else {
                return this.picking_ticket_list.length;
            }
        }
    },
    mounted(){
      this.getList(); 
    },
    methods: {
        getList(){
            this.$http.get('api/load-ticket-issuance/2')
                .then((response) => {
                    this.picking_ticket_list = response.data.data;
                    console.log(this.picking_ticket_list);
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
        reprintPickingTicket(){
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
                    this.printPdf();
                    this.getList();
                    this.selected_list =[];
                }).catch((response) => {
                    console.log(response);
                })
        },
         printPdf(){
           this.$http.get('api/print-ticket', {
                params:
                ({
                    data:  JSON.stringify(this.selected_list),
                }),
                responseType: 'blob', Accept: 'application/pdf',
            })
                .then((response) => {
                    console.log(response)
                    const file = new Blob(
                        [response.data],
                        { type: 'application/pdf' });
                    const fileURL = URL.createObjectURL(file);
                    // $('.loader').hide();
                    window.open(fileURL);  

                }).catch((response) => {
                    console.log(response);
                })
       }
    }
}
</script>

<style scoped>

</style>