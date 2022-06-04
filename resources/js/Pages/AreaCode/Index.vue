<template>
<div>
    <nav-bar/>
      <section class="content-header">
            <div class="container-fluid">
                <h4>Area Management</h4>    
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <b-row>
                                    <b-col sm="5">
                                        <label for="area-code">Area code</label>
                                        <b-form-input
                                        id="area-code"
                                        v-model="area_code"
                                        placeholder="Area Code"
                                        required
                                        ></b-form-input>
                                    </b-col>
                                    <b-col sm="5">
                                        <label>Status:</label>
                                                <select class="form-control" name="position" id="slc_status" v-model="status" required>
                                                    <option disabled selected value="">Select</option>
                                                    <option value="1"> Active </option>
                                                    <option value="0"> Inactive </option>
                                                </select>
                                        <!-- <label>Status:</label>
                                            <b-form-checkbox
                                                v-model="status"
                                                switch
                                            ></b-form-checkbox> -->
                                    </b-col>
                                </b-row>
                            
                                    <div style="text-align: right;">
                                      <hr>
                                      <button type="submit" id="btn_save" class="btn btn-success"> Register </button>
                                      <button type="submit" id="btn_save" class="btn btn-danger"> Reset </button>
                                      <button type="submit" id="btn_save" class="btn btn-primary"> Save </button>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <b-card class="mt-3">
                            <div class="card-body">
                                <h5>List of Area Code</h5>
                                <table-component    
                                    :fields="fields"
                                    :items="items"
                                    :perPage="10"
                                    :rows="5"
                                    :status="''"
                                    :action_dropdown="true"
                                    :is_search="true"
                                    :flag="'area_code'"
                                    :is_select= "false"/>
                            </div>
                        </b-card>

                    </div>
                </div>
             
                 
               
            </div>
        </section>

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