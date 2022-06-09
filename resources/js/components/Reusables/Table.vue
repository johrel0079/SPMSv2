<template>
  <div>
    <b-row v-if="is_search || is_select">
      <!-- <b-col sm="6">
        <b-button
          v-if="is_select"
          class="btn btn-primary-third-custom btn-width"
          @click="selectAllRows"
        >
          Select all ticket/s
        </b-button>
      </b-col> -->
      <b-col
        sm="12"
        class="d-flex flex-row-reverse p-0"
      >
       <b-row class="mb-3 mr-1 float-right">
          <b-input-group size="sm">
              <b-form-input
                  id="filter-input"
                  name="search"
                  type="search"
                  v-model="filter"
                  placeholder="Type to Search"
                  autocomplete="off">
              </b-form-input>
              <b-input-group-append>
                  <b-button 
                      variant="primary"
                      title="Click to Clear Inputs"
                      :disabled="!filter" 
                      @click="filter = ''">
                          Clear
                  </b-button>
              </b-input-group-append>
          </b-input-group>
      </b-row>
        <!-- <b-form
          v-if="is_search"
          class="mb-3"
        >
          <b-form-input
            id="search-form"
            v-model="search_keyword"
            class="form-control"
            placeholder="Search"
          />
        </b-form> -->
      </b-col>
    </b-row>
    <b-table
     id="tbl_reusable"
      ref="tbl_reusable"
      responsive
      :stickyColumn="stickyColumn"
      :items="items"
      :filter="filter"
      :fields="fields"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      :per-page="perPage"
      :current-page="currentPage"
      label-sort-asc=""
      label-sort-desc=""
      label-sort-clear=""
      :selectable="is_select"
      @row-selected="selectedRow">
      <template #cell(select)="{ rowSelected }">
        <template v-if="rowSelected">
          <span aria-hidden="true"><b-icon icon="check-square-fill" /></span>
        </template>
        <template v-else>
          <span aria-hidden="true"><b-icon icon="square" /></span>
        </template>
      </template>
      <template
        #cell(picker_name)="data"
      >
        {{data.item.first_name}} {{data.item.last_name }}
      </template>
      <template
        v-if="action_dropdown"
        #cell(action)="data"
      >
        <b-button class="btn btn-success btn-sm" @click="emitId(data.item)"><b-icon icon="pencil-square"></b-icon></b-button> 
        <button class="btn btn-danger btn-sm  "><b-icon icon="trash-fill"></b-icon> </button>
      </template>
    </b-table>
    <b-pagination
      align="right"
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage">
    </b-pagination>
    <div
      v-if="items.length==0"
      class="text-center text-muted"
    >
      <i>No records found.</i>
    </div>
  </div>
</template>

<script>
export default {
    name: 'TableComponent',
    props: {
        fields: {
            type: Array,
            required: true
        },
        items: {
            type: Array,
            required: true
        },
        perPage: {
            type: Number,
            required: true
        },
        rows: {
            type: Number,
            required: true
        },
        status: {
            type: String,
            required: true
        },
        // eslint-disable-next-line vue/prop-name-casing
        action_dropdown: {
            type: Boolean,
            required: true
        },
        // eslint-disable-next-line vue/prop-name-casing
        is_search: {
            type: Boolean,
            required: true
        },
        flag: {
            type: String,
            required: true
        },
        // eslint-disable-next-line vue/prop-name-casing
        is_select: {
            type: Boolean,
            required: true
        },
        stickyColumn: {
            type: Boolean,
            required: true
        }
    },
    data(){
        return {
            sortBy: '',
            sortDesc: false,
            sortDirection: 'asc',
            search_keyword: '',
            filter: null,
            filterOn: [],
            currentPage: 1,
            selected: [],
            id: null
        };
    },
    watch: {
        search_keyword(value) {
            this.$emit('searchKeywordChange', value);
        },
    },
    methods : {
        emitId(value){
          this.$emit('emittedId', value);
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length;
            this.currentPage = 1;
        },
        selectedRow(items){
            if(this.is_select){
                this.selected = items;
            }

            this.$emit('selectData', this.selected);
            console.log('items',items);
        },
        selectAllRows() {
            this.$refs.tbl_reusable.selectAllRows();
            console.log(this.selected);
        },
    }
};
</script>
<style lang="scss" scoped>
  table td th{
    font-size: 13px !important;
  }
  .table > :not(:first-child) {
    border-top: 0 !important;
  }
  thead {
    border-bottom-width: 0px !important;
  }
</style>