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
        <b-form
          v-if="is_search"
          class="mb-3"
        >
          <b-form-input
            id="search-form"
            v-model="search_keyword"
            class="form-control"
            placeholder="Search"
          />
        </b-form>
      </b-col>
    </b-row>
    <b-table
     id="tbl_reusable"
      ref="tbl_reusable"
      responsive
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
      :selectable="is_select">
      <template
        v-if="action_dropdown"
        #cell(action)="data"
      >
        <b-button class="btn btn-success btn-sm" @click="emitId(data.item)"><b-icon icon="pencil-square"></b-icon></b-button> 
        <button class="btn btn-danger btn-sm  "><b-icon icon="trash-fill"></b-icon> </button>
      </template>
    </b-table>
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

            this.$emit('prsSelected', this.selected);
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
  td th{
    font-size: 13px !important;
  }
  .table > :not(:first-child) {
    border-top: 0 !important;
  }
  thead {
    border-bottom-width: 0px !important;
  }
</style>