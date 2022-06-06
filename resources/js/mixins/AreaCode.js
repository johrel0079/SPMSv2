export default {
    methods: {
        $_areaCodeMixin_getList() {
            this.$http.get('api/area')
                .then((response) => {
                    this.area_code_list = response.data.data
                    console.log(response);
                });
        }
    }
}