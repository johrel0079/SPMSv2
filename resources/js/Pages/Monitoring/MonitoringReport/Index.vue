<template>
<div class="page-content">
    <div class="bg-color">
    <nav-bar/>
    <div class="mb-4">
         <div class="container">
             <h5 class="mt-3">Monitoring Report</h5> 
              <b-row class="mt-3">
                    <b-col>
                        <b-button
                            variant="primary" 
                            size="sm" 
                            class="mt-1"
                            id="batch-export"
                            type="submit"
                            title="Click to export"
                            style="float:right">
                            Export
                        </b-button>
                    </b-col>
                </b-row> 
                    <b-card class="mt-3">
                    <table-component    
                        :stickyColumn="true"
                        :fields="fields"
                        :items="master_data_list"
                        :perPage="perPage"
                        :rows="rows"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :flag="'master_data'"
                        :is_select= "false"
                        >
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
            master_data_list:[],
            fields: [
            {
                key: 'order_download_no',
                sortable: true
            },
            {
                key: 'item_no',
                sortable: true
            },
            {
                key: 'ticket_no',
                sortable: true
            },
            {
                key: 'issuance_date',
                sortable: true
            },
            {
                key: 'distribution_data',
                sortable: true,
                label: 'distribution_date'
            },
            {
                key: 'checking_date',
                sortable: true
            },
            {
                key: 'parts_for_dr_date',
                sortable: true
            },
            {
                key: 'update_delivery_date',
                sortable: true
            },
           
            ],
            id: 0,
            is_loading: false,
            //pagination
            perPage: 10,
        };
       
    },
    computed:{
        rows(){
            if(!this.master_data_list){
                return 1;
            } else {
                return this.master_data_list.length;
            }
        }
    },
    mounted(){
        this.getList();
    },
    methods: {
        getList(){
          this.$http.get('api/monitoring')
                .then((response) => {
                    // console.log(response)
                    this.master_data_list = response.data.data
                });
      },
      
    }
}
</script>

<style scoped>
.upload-input-file {
    border:1px gray;
    border-radius:4px;
    color:black;
    outline: black;
    padding:4px 4px 4px 4px;
    transition:.5s;
    width: 100%;
}
</style>