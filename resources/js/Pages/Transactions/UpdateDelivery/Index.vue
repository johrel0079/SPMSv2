<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Update Delivery</h5>    
                <b-row class="mt-3">
                    <b-col cols="2">
                        <label for="dr-control">DR Control Number:</label>
                    </b-col>
                    <b-col cols="3">
                        <b-form-input
                            @keyup.enter="submitBarcode(dr_control)"
                            id="dr-control"
                            v-model="dr_control"
                            placeholder="DR Control"
                            required
                        ></b-form-input>
                    </b-col>
                </b-row>
                <b-card class="mt-3">
                    <table-component    
                        :flag="'update-delivery'"
                        :stickyColumn="true"
                        :fields="fields"
                        :items="update_delivery_list"
                        :perPage="perPage"
                        :rows="rows"
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
            dr_control: '',
            fields: [
            {
                key: 'select',
                sortable: true
            },
            {
                key: 'control_number',
                sortable: true
            },
            {
                key: 'ticket_count',
                sortable: true
            },
            {
                key: 'destination',
                sortable: true
            },
            ],
            update_delivery_list: [],
            //pagination
            perPage: 10,
        };
       
    },
    computed:{
        rows(){
            if(!this.update_delivery_list){
                return 1;
            } else {
                return this.update_delivery_list.length;
            }
        }
    },
    mounted(){
       
    },
    methods: {
       submitBarcode(dr_control){
            let is_exist = this.update_delivery_list.findIndex(function(list) {
                return (list.control_number == dr_control) ?  true : false
                   
            });

            if(is_exist){
                 this.$http.get('api/update-delivery/' + dr_control)
                .then((response) => {
                    console.log(response);
                    if(response.data.data.length!=0){
                        this.update_delivery_list.push(response.data.data[0]);
                        this.dr_control = '';
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
       }   
    }
}
</script>

<style scoped>

</style>