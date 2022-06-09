<template>
<div class="page-content">
    <div class="bg-color">
    <nav-bar/>
    <div class="mb-4">
         <div class="container px-3">
             <h5 class="mt-3">Role Management</h5> 
                      <b-row>
                          <b-col sm="6">
                              <!-- <div class="mt-3"> -->
                                <label for="area-code">User</label>
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
                                <b-button variant="primary" size="sm" class="px-4 mt-3" @click="submit()">
                                    {{button_name}}
                                </b-button>
                                <b-button v-if="button_name=='Update'" @click="submitCancel()" variant="secondary" size="sm" class="px-4 mt-3">
                                    Cancel
                                </b-button>
                            </div>
                      </b-row>

                    <b-card class="mt-3">

                            <h6>List of Users</h6>
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
                                    @emittedId="getAreaId">
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
            id: null,
            button_name: 'Save'
        };
       
    },
    mounted(){
        this.$_areaCodeMixin_getList();
    },
    methods: {
        getAreaId(value){
            this.area_code = value.code;
            this.id = value.id
            this.button_name = 'Update'
        },
        submitCancel(){
            this.area_code = '';
            this.id = null;
            this.button_name = 'Save'
        },
        async submit(){
            let data = {
                code: this.area_code
            }
            if(this.button_name=='Save'){
                await this.$http.post('api/area', data)
                .then((response) => {
                    this.$_areaCodeMixin_getList();
                    console.log(response)
                }).catch((response) => {
                    console.log(response);
                })
            }else {
                await this.$http.put('api/area/'+this.id, data)
                .then((response) => {
                    this.$_areaCodeMixin_getList();
                    console.log(response)
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