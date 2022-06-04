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
      :selectable="is_select"
      @filtered="onFiltered"
      @row-selected="selectedRow"
    >
      <template #cell(select)="{ rowSelected }">
        <template v-if="rowSelected">
          <span aria-hidden="true"><b-icon icon="check-square-fill" /></span>
        </template>
        <template v-else>
          <span aria-hidden="true"><b-icon icon="square" /></span>
        </template>
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
            ticket_id: 0,
            ticket_key: 0,
            po_key: 1,
            selected: [],
        };
    },
    watch: {
        search_keyword(value) {
            this.$emit('searchKeywordChange', value);
        },
    },
    methods : {
      
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
<style scoped>
  a {
      color: #0a4296 !important;
      cursor: pointer !important;
  }
  a:hover {
      text-decoration: underline !important;
  }
.table.b-table > tbody > .table-active, .table.b-table > tbody > .table-active > th, .table.b-table > tbody > .table-active > td {
    background-color: transparent !important;
}

.table.b-table > tbody > .table-active, .table.b-table > tbody > .table-active > th, .table.b-table > tbody > .table-active > td {
    background-color: transparent !important;
}

.table-active {
    --bs-table-accent-bg: transparent !important;

}
.table > :not(:first-child) {
    border-top: 0 !important;
}
</style>