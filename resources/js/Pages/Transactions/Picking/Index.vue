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
                            @keyup.enter="submitBarcode(barcode)"
                            id="barcode"
                            v-model="barcode"   
                            placeholder="Barcode"
                            required
                        ></b-form-input>
                    </b-col>
                </b-row>
                <b-card class="mt-3">
                    <table-component    
                        :flag="'picking'"
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
                            @click="submitFinish()"
                            style="float:right"
                            variant="primary"
                            class="mt-1"
                            id="button-finished"
                            type="submit"
                            title="Click to Finished">Finish
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
                label: 'Issue Date',
                key: 'ticket_issue_date',
                sortable: true
            },
            {
                key: 'picker_name',
                sortable: true
            },
            {
                key: 'item_no',
                sortable: true
            },
            {
                key: 'ticket_no',
                label: 'Barcode',
                sortable: true
            },
            {
                key: 'delivery_qty',
                label: 'Quantity',
                sortable: true
            },
            {
                label: 'Date Barcoded',
                key: 'delivery_inst_date',
                sortable: true
            },
            ],
            picking_list: [],
            barcode: '',
            finish_count: 0,
        };
       
    },
    mounted(){
       
    },
    methods: {
        submitBarcode(ticket_no){
            let is_exist = this.picking_list.findIndex(function(list) {
                return (list.ticket_no == ticket_no) ?  true : false
                   
            });

            if(is_exist){
                 this.$http.get('api/picking/' + ticket_no)
                .then((response) => {
                    console.log(response);
                    if(response.data.data.length!=0){
                        this.picking_list.push(response.data.data[0]);
                        this.finish_count = this.picking_list.length;
                        this.barcode = '';
                    }else{
                        this.$toast.warning("Item doesn't exist");
                    }
                    
                 })
                .catch((error) => {
                    this.$toast.error("Something went wrong");
                    console.log(error);
                })
                .finally(() => {
                });
            }else{
                this.$toast.warning("Item already exist");
                this.barcode = '';
            }   
            
        },
         submitFinish(){
            if(!this.finish_count){
                this.$toast.warning("Barcode is required");
            }else{
                let picking_id = [];
                this.picking_list.forEach(selected => {
                    picking_id.push(selected.master_data_id);
                });
         
                let data = {
                    master_data_id : picking_id,
                }
                this.$http.post('api/picking', data)
                .then((response) => {
                    console.log(response)
                    this.$toast.success(response.data.message);
                    this.picking_list = [];
                }).catch((response) => {
                    console.log(response);
                })

            }
          
        }
    }
}
</script>

<style scoped>
</style>