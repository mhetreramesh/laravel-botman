<template>
    <div>
        <h1>Categories</h1>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateCategory' }" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Create Category</router-link>
          </div>
        </div><br />
        <div class="loading" v-if="loading">
            <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>
        </div>
        <table class="table table-hover" v-else>
            <thead>
            <tr>
                <td>ID</td>
                <td>Category</td>
                <td>Parent</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
                <tr v-for="category in categories">
                    <td>{{ category.id }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.parent ? category.parent.name : '-' }}</td>
                    <td>
                        <router-link :to="{name: 'EditCategory', params: { id: category.id }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</router-link>
                        <button class="btn btn-danger" v-on:click="deleteCategory(category.id)"><i class="fa fa-trash"></i>  Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <v-paginator :resource_url="resource_url" @update="updateResource"></v-paginator>
    </div>
</template>

<script>
    import VuePaginator from 'vuejs-paginator'
    export default {
        components: {
            VPaginator: VuePaginator
        },
        data(){
            return{
                categories: [],
                loading: true,
                resource_url: `${window.Laravel.baseUrl}/api/categories`
            }
        },
        methods: {
            updateResource(data){
              this.categories = data
              this.loading = false
            },
            deleteCategory(id)
            {
                for (var key in this.categories) {
                    if (this.categories[key].id == id) {
                        this.categories.splice(key, 1)
                    }
                }
                let uri = `${window.Laravel.baseUrl}/api/categories/${id}`
                this.axios.delete(uri)
            }
        }
    }
</script>
