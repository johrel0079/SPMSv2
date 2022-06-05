<template>
<div class="page-content">
    <div class="bg-color">
    <nav-bar/>
    <div class="mb-4">
         <div class="container px-3">
             <h5 class="mt-3">Area Management</h5> 
              <b-row>
                  <b-col sm="6">
                      <b-row>
                          <b-col sm="6">
                              <div class="mt-3">
                                <label for="area-code">Area code</label>
                                <b-form-input
                                    id="area-code"
                                    v-model="area_code"
                                    placeholder="Area Code"
                                    required
                                ></b-form-input>
                                    <div class="mt-2">
                                        <label>Status</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" v-model="status" type="checkbox" role="switch" id="status">
                                        </div>
                                    </div>
                              </div>
                              
                                <b-button variant="primary" size="sm" class="px-4 mt-3">
                                    Save
                                </b-button>
                          </b-col>
                      </b-row>
                       
                  </b-col>
                  <b-col sm="6">
                    <b-card>

                            <h6>List of Area Code</h6>
                                <table-component    
                                    :fields="fields"
                                    :items="items"
                                    :perPage="10"
                                    :rows="5"
                                    :status="''"
                                    :action_dropdown="true"
                                    :is_search="true"
                                    :flag="'area_code'"
                                    :is_select= "false">
                                    <template #action>
                                        <button class="btn btn-success btn-md"><b-icon icon="pencil-square"></b-icon></button> 
                                        <button class="btn btn-danger btn-md"><b-icon icon="trash-fill"></b-icon> </button>
                                    </template>
                                    </table-component>
                 
                    </b-card>
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
            area_code: '',
            status: null,
            fields: [
            {
                key: 'area_code',
                sortable: true
            },
            {
                key: 'status',
                sortable: false
            },
            {
                key: 'action',
            }
            ],
            items: [
                {
                    area_code: 'C1',
                    status: 1
                }
            ],
        };
       
    }
}
</script>

<style scoped>

</style>