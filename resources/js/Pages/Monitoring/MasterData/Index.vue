<template>
<div class="page-content">
    <div class="bg-color">
    <nav-bar/>
    <div class="mb-4">
         <div class="container">
             <h5 class="mt-3">Master Data</h5> 
                      <b-row class="mt-3">
                          <b-form
                            id="form-upload"
                            @submit.prevent="uploadFile"
                            method="post">
                            <b-col>
                                <b-row>
                                    <b-col cols="3">
                                    <input
                                        class="upload-input-file"
                                        id="input-file"
                                        name="file"
                                        type="file"
                                        />
                                    </b-col>
                                    <b-col cols="2">
                                        <b-button
                                            :disabled="is_loading"
                                            variant="primary" 
                                            size="sm" 
                                            class="mt-1"
                                            id="button-upload"
                                            type="submit"
                                            title="Click to Upload"
                                            style="width: 100%">Upload
                                        </b-button>
                                    </b-col>
                                    <b-col cols="2">
                                        <b-button
                                            variant="primary" 
                                            size="sm" 
                                            class="mt-1"
                                            id="button-sync"
                                            title="Click to Sync"
                                             style="width: 100%">Sync
                                        </b-button>
                                    </b-col>
                                </b-row>
                            </b-col>
                        </b-form>
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
                key: 'warehouse_class',
                sortable: true
            },
            {
                key: 'delivery_form',
                sortable: true
            },
            {
                key: 'item_no',
                sortable: true
            },
            {
                key: 'item_rev',
                sortable: true
            },
            {
                key: 'delivery_qty',
                sortable: true
            },
            {
                key: 'stock_address',
                sortable: true
            },
            {
                key: 'manufacturing_no',
                sortable: true
            },
            {
                key: 'stock_address',
                sortable: true
            },
            {
                key: 'delivery_inst_date',
                sortable: true
            },
            {
                key: 'destination_code',
                sortable: true
            },
            {
                key: 'item_name',
                sortable: true
            },
            {
                key: 'product_no',
                sortable: true
            },
            {
                key: 'ticket_no',
                sortable: true
            },
            {
                key: 'ticket_issue_date',
                sortable: true
            },
            {
                key: 'ticket_issue_time',
                sortable: true
            },
             {
                key: 'order_download_no',
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
          this.$http.get('api/masterdata')
                .then((response) => {
                    this.master_data_list = response.data.data
                });
      },
      uploadFile() {
        if(document.getElementById("input-file").value == "")
        {
            this.$toast.warning("Please select file to upload.");
        }
        else{
            this.is_loading=true;
            var formData = new FormData();
            var excelFile = document.querySelector("#input-file");
            let fileType = excelFile.files[0].name.split('.')[1];
            
            if((fileType !== 'csv') && (fileType !== 'xlsx')){
            document.getElementById("input-file").value = "";
            this.$toast.warning("Please Upload a CSV or XLSX file type only.");
            }
            else{
            formData.append("file", excelFile.files[0]);
            this.$http.post('api/masterdata', formData)
            .then((response)=>{
                this.getList();
                document.getElementById("input-file").value = "";
                this.$toast.success(response.data.message);
                this.is_loading=false;
            })
            .catch((error) => {
                this.toast("error", "Something went wrong");
                document.getElementById("input-file").value = "";
                console.log(error);
                this.is_loading=false;
            })
            .finally(() => {
            });
            }
        }
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