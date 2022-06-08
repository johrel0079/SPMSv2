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
                        :flag = "'checking'"
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
                            @click="submitFinish()"
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
                label: 'Barcode',
                key: 'ticket_no',
                sortable: true
            },
            {
                label: 'Part Number',
                key: 'item_no',
                sortable: true
            },
            {
                key: 'delivery_qty',
                label: 'Quantity',
                sortable: true
            },
            {
                key: 'order_download_no',
                sortable: true
            },
            // {
            //     key: 'process',
            //     sortable: true
            // },
            ],
            checking_list: [],
            
        };
       
    },
    mounted(){
       
    },
    methods: {
        submitBarcode(ticket_no){
            let is_exist = this.checking_list.findIndex(function(list) {
                return (list.ticket_no == ticket_no) ?  true : false
                   
            });

            if(is_exist){
                 this.$http.get('api/checking/' + ticket_no)
                .then((response) => {
                    console.log(response);
                    if(response.data.data.length!=0){
                        this.checking_list.push(response.data.data[0]);
                        console.log(this.checking_list);
                        // this.finish_count = this.picking_list.length;
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
            if(!this.checking_list){
                this.$toast.warning("Barcode is required");
            }else{
                let checking_id = [];
                this.checking_list.forEach(selected => {
                    checking_id.push(selected.id);
                });
         
                let data = {
                    master_data_id : checking_id,
                }
                this.$http.post('api/checking', data)
                .then((response) => {
                    console.log(response)
                    this.$toast.success(response.data.message);
                    this.checking_list = [];
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