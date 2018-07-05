<template>
    <div>
        <h1>Update Article</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayItem' }" class="btn btn-success">Return to Articles</router-link></div>
        </div>
        <div class="loading" v-if="loading">
            <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>
        </div>
        <form v-on:submit.prevent="updateItem" v-else>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" v-model="item.name">
            </div>

            <div class="form-group">
                <label name="product_price">Price</label>
                <input type="text" class="form-control" v-model="item.price">
            </div>

            <div class="form-group">
                <label name="product_price">SKU</label>
                <input type="text" class="form-control" v-model="item.sku">
            </div>

            <div class="form-group">
                <label name="product_price">EAN</label>
                <input type="text" class="form-control" v-model="item.ean">
            </div>

            <div class="form-group">
                <label name="product_price">Quantity</label>
                <input type="text" class="form-control" v-model="item.quantity">
            </div>

            
            <div class="form-group">
                <label>Categories</label>
                <multiselect
                    v-model="item.categories"
                    :options="categories"
                    :multiple="true"
                    track-by="id"
                    :custom-label="customLabel">
                </multiselect>
            </div>

            <div class="form-group">
                <button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                <router-link :to="{ name: 'DisplayItem' }" class="btn btn-default pull-right">Cancel</router-link>
            </div>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default{
        components: { Multiselect },
        data(){
            return{
                item:{},
                loading:true,
                categories: []
            }
        },

        created: function() {
            this.getItem()
            this.fetchCategories()
        },

        methods: {
            customLabel(option){
                return `${option.name}`
            },
            fetchCategories()
            {
                let uri = `${window.Laravel.baseUrl}/api/categories/all`;
                this.axios.get(uri).then((response) => {
                    this.categories = response.data
                });
            },
            getItem()
            {
              let uri = `${window.Laravel.baseUrl}/api/items/${this.$route.params.id}/edit`
                this.axios.get(uri).then((response) => {
                    this.loading = false
                    this.item = response.data
                });
            },
            updateItem()
            {
              let uri = `${window.Laravel.baseUrl}/api/items/${this.$route.params.id}`
                this.axios.patch(uri, this.item).then((response) => {
                  this.$router.push({path: '/'})
                });
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>