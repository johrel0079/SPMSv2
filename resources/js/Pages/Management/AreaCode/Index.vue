<template>
<div class="page-content">
    <div class="bg-color">
    <nav-bar/>
    <div class="mb-4">
         <div class="container px-3">
             <h5 class="mt-3">Area Management</h5> 
                      <b-row>
                          <b-col sm="6">
                              <!-- <div class="mt-3"> -->
                                <label for="area-code">Area code</label>
                                <b-form-input
                                    id="area-code"
                                    v-model="area_code"
                                    placeholder="Area Code"
                                    required
                                ></b-form-input>
                            </b-col>
                            <b-col sm="6">
                                <label>Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" v-model="status" type="checkbox" role="switch" id="status">
                                </div>
                            </b-col>
                            <div>
                                <b-button variant="primary" size="sm" class="px-4 mt-3">
                                Save
                            </b-button>
                            </div>
                      </b-row>

                    <b-card class="mt-3">

                            <h6>List of Area Code</h6>
                                <table-component    
                                    :fields="fields"
                                    :items="area_code_list"
                                    :perPage="10"
                                    :rows="5"
                                    :status="''"
                                    :action_dropdown="true"
                                    :is_search="true"
                                    :flag="'area_code'"
                                    :is_select= "false"
                                    :getId="getAreaId()">
                                    </table-component>
                 
                    </b-card>
                 
            
            </div>
    </div>


           
      
</div>
</div>

</template>

<script>
import AreaCodeMixin from '../../../mixins/AreaCode'
export default 
{
    mixins: [AreaCodeMixin],
    data(){
        return {
            area_code: '',
            status: null,
            fields: [
            {
                key: 'code',
                sortable: true
            },
            // {
            //     key: 'status',
            //     sortable: false
            // },
            {
                key: 'action',
            }
            ],
            area_code_list: [],
            id: 0,
        };
       
    },
    mounted(){
        this.$_areaCodeMixin_getList();
    },
    methods: {
        getAreaId(id){
            this.id = id;
            console.log(id)
        }
    }
}
</script>

<style scoped>

</style>