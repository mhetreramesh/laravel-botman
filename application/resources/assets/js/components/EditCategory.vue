<template>
    <div>
        <h1>Update Article</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayCategory' }" class="btn btn-success">Return to Categories</router-link></div>
        </div>

        <form v-on:submit.prevent="updateCategory">
            <div class="form-group">
                <label>Parent Category</label>
                <select v-model="category.parent_id" class="form-control">
                <option v-for="tmpCategory in categories" v-bind:value="tmpCategory.id">
                    {{ tmpCategory.name }}
                </option>
                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" v-model="category.name" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                <router-link :to="{ name: 'DisplayCategory' }" class="btn btn-default pull-right">Cancel</router-link>
            </div>
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                category:{},
                categories: [
                    { name: 'Select', id: '' }
                ]
            }
        },

        created: function(){
            this.getCategory()
            this.fetchCategories()
        },

        methods: {
            fetchCategories()
            {
                let uri = `${window.Laravel.baseUrl}/api/categories/all`;
                this.axios.get(uri).then((response) => {
                    this.categories = response.data
                    this.categories.unshift({ name: 'Select', id: '' })
                });
            },
            getCategory()
            {
                let uri = `${window.Laravel.baseUrl}/api/categories/${this.$route.params.id}/edit`
                this.axios.get(uri).then((response) => {
                    this.category = response.data
                });
            },

            updateCategory()
            {
                let uri = `${window.Laravel.baseUrl}/api/categories/${this.$route.params.id}`
                this.axios.patch(uri, this.category).then((response) => {
                  this.$router.push({path: '/categories'})
                });
            }
        }
    }
</script>
