<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Picking Ticket Distribution</h5>   
                <b-row class="mt-5">
                    <b-col cols="2">
                        <label for="picker-id">Picker:</label>
                    </b-col>
                    <b-col cols="3">
                        <multiselect 
                            id="picker_id" 
                            v-model="picker"
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
                        :stickyColumn="true"
                        :flag="'distribution'"
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
                        <label for="total-ticket">Total Ticket:</label> {{ticket_count}}
                    </b-col>
                    <b-col cols="6">
                        <label for="total-qty">Total Qty:</label> {{getQuantityCount()}}
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
            picker: {},
            barcode: '',
            fields: [
            // {
            //     key: 'no',
            //     sortable: true
            // },
            {
                key: 'item_no',
                label: 'Part Number',
                sortable: true
            },
            {
                key: 'destination_code',
                label: 'Destination',
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
            
            ],
            distribution_list: [],
            picker_options: [],
            ticket_count: 0,
        };
       
    },
    mounted(){
       this.getPicker();
    },
    methods: {
       getPicker(){
            this.$http.get('api/load-picker')
                .then((response) => {
                    let picker = response.data.data;
                    console.log(picker);
                    for (const key in picker) {
                        this.picker_options.push({
                            id : picker[key].id,
                            name: picker[key].first_name + ' ' + picker[key].last_name,
                        })
                    }
                 })
                .catch((error) => {
                    this.$toast.error("Something went wrong");
                    console.log(error);
                })
                .finally(() => {
                });
        },
        submitBarcode(ticket_no){
            let is_exist = this.distribution_list.findIndex(function(list) {
                return (list.ticket_no == ticket_no) ?  true : false
                   
            });

            if(is_exist){
                 this.$http.get('api/distribution/' + ticket_no)
                .then((response) => {
                    this.distribution_list.push(response.data.data[0]);
                    this.ticket_count = this.distribution_list.length;
                    console.log(this.distribution_list);
                    this.barcode = '';
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
        getQuantityCount(){
            let total_quantity = 0; 
            for (const key in this.distribution_list) {
               total_quantity = total_quantity + this.distribution_list[key].delivery_qty
            }
            return total_quantity;
        }
    }
}
</script>

<style scoped>

</style>