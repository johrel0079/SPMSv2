<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Parts for DR Making</h5>  
                <b-row class="mt-3">
                    <b-col cols="2">
                        <label for="approver_id">Approved By:</label>
                    </b-col>
                    <b-col cols="3">
                        <multiselect 
                            id="approver_id" 
                            v-model="approver_id"
                            name="approver_id"
                            :options="approver_options" 
                            :searchable="true"
                            :show-labels="false"
                            placeholder='Approver'
                            label="name" 
                            track-by="id"></multiselect>
                    </b-col>
                </b-row>   
                
                 <b-card class="mt-3">
                    <table-component    
                        :stickyColumn="true"
                        :fields="fields"
                        :items="parts_for_dr_list"
                        :perPage="perPage"
                        :rows="rows"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :is_select= "true"
                        >
                    </table-component>
                </b-card>

                <b-row class="mt-3">
                    <b-col>
                        <b-button
                            style="float:right"
                            variant="primary"
                            class="mt-1"
                            id="button-print"
                            type="submit"
                            title="Click to Print">Print Selected DR
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
            approver_id : '',
            approver_options: [
                { name: 'Juan dela Cruz', id: '000001' },
                { name: 'Juana dela Cruz', id: '000002' },
            ],
            fields: [
            {
                key: 'select',
                sortable: true
            },
            {
                key: 'control_no',
                sortable: true
            },
            {
                key: 'ticket_no',
                sortable: true
            },
            {
                key: 'destination',
                sortable: true
            },
            ],
            parts_for_dr_list: [],
            //pagination
            perPage: 10,
        };
       
    },
    computed:{
        rows(){
            if(!this.parts_for_dr_list){
                return 1;
            } else {
                return this.parts_for_dr_list.length;
            }
        }
    },
    mounted(){
       
    },
    methods: {
       
    }
}
</script>

<style scoped>

</style>