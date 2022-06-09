<template>
<div class="page-content">
    <div class="bg-color">
        <nav-bar/>
        <div class="mb-4">
            <div class="container px-3">
                <h5 class="mt-3">Parts for DR Making</h5>  

                 <b-card class="mt-3">
                    <table-component    
                        :flag="'parts-for-dr'"
                        :stickyColumn="true"
                        :fields="fields"
                        :items="parts_for_dr_list"
                        :perPage="perPage"
                        :rows="rows"
                        :status="''"
                        :action_dropdown="true"
                        :is_search="true"
                        :is_select= "true"
                        @selectData="getSelected"
                        >
                    </table-component>
                </b-card>

                <b-row class="mt-3">
                    <b-col>
                        <b-button
                            @click="submitFinish()"
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
            parts_for_dr_list: [],
            perPage: 10,
            selected_list: [],
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
       this.getList();
    },
    methods: {
       getList(){
            this.$http.get('api/parts-for-dr')
                .then((response) => {
                    console.log(response);
                    this.parts_for_dr_list = response.data.data;
                 })
                .catch((error) => {
                    this.toast.error("Something went wrong");
                    console.log(error);
                })
                .finally(() => {
                });
        },
        getSelected(value){
            this.selected_list=value;
            console.log(this.selected_list);
        },
        submitFinish()
       {
            let select_id = [];
           this.selected_list.forEach(selected => {
               select_id.push(selected.control_number);
           });
        //    
           let data = {
               control_number : select_id
           }
           this.$http.post('api/parts-for-dr', data)
                .then((response) => {
                    console.log(response);
                    this.$toast.success(response.data.data);
                    this.getList();
                }).catch((response) => {
                    this.$toast.error('Something went wrong');
                    console.log(response);
                })
       }

    }
}
</script>

<style scoped>

</style>