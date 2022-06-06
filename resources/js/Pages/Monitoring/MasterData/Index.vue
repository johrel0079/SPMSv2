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
                                        class="file-input"
                                        id="input-file"
                                        name="file"
                                        type="file"
                                        />
                                    </b-col>
                                    <b-col cols="3">
                                    <b-button
                                        variant="primary" size="sm" class="mt-1"
                                        id="button-upload"
                                        type="submit"
                                        title="Click to Upload">Upload
                                    </b-button>
                                    </b-col>
                                </b-row>
                            </b-col>
                        </b-form>
                      </b-row>

                    <!-- <b-card class="mt-3"> -->

                            <!-- <h6>List of Area Code</h6> -->
                                <table-component    
                                    :stickyColumn="true"
                                    :fields="fields"
                                    :items="master_data_list"
                                    :perPage="10"
                                    :rows="5"
                                    :status="''"
                                    :action_dropdown="true"
                                    :is_search="true"
                                    :flag="'master_data'"
                                    :is_select= "false"
                                    >
                                    </table-component>
                 
                    <!-- </b-card> -->
                 
            
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
        };
       
    },
    mounted(){
        this.getList();
    },
    methods: {
      getList(){
          this.$http.get('api/masterdata')
                .then((response) => {
                    this.master_data_list = response.data.data
                    console.log(response);
                });
      },
      uploadFile() {
           if(document.getElementById("input-file").value == "")
      {
        this.toast("Warning", "Please select file to upload.");
      }
      else{
        var formData = new FormData();
        var excelFile = document.querySelector("#input-file");
        let fileType = excelFile.files[0].name.split('.')[1];
          
        if((fileType !== 'csv') && (fileType !== 'xlsx')){
          document.getElementById("input-file").value = "";
          this.toast("Warning", "Please Upload a CSV or XLSX file type only.");
        }
        else{
        formData.append("file", excelFile.files[0]);
         this.$http.post('api/masterdata', formData)
        .then((response)=>{
            this.getList();
          console.log(response);
         
          })
          .catch((error) => {
            this.toast("error", "Something went wrong");
            document.getElementById("input-file").value = "";
            console.log(error);
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
.file-input {
    border:1px gray;
    border-radius:4px;
    color:black;
    outline: black;
    padding:4px 4px 4px 4px;
    transition:.5s;
    width: 100%;
}
</style>