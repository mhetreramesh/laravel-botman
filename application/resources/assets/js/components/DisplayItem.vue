<template>
    <div>
        <h1>Articles</h1>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateItem' }" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Create Article</router-link>
          </div>
        </div><br />
        <div class="loading" v-if="loading">
            <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>
        </div>
        <table class="table table-hover" v-else>
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Categories</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
                <tr v-for="item in items">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price }}€</td>
                    <td>{{ item.quantity }}</td>
                    <td style="width:10em;">
                        <span class="badge" v-for="category of item.categories">{{ category.name }}</span>
                    </td>
                    <td>
                        <router-link :to="{name: 'EditItem', params: { id: item.id }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</router-link>
                        <button class="btn btn-danger" v-on:click="deleteItem(item.id)"><i class="fa fa-trash"></i> Delete</button></td>
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
                items: [],
                loading: true,
                resource_url: `${window.Laravel.baseUrl}/api/items`
            }
        },

        methods: {
            updateResource(data){
              this.items = data
              this.loading = false
            },
            deleteItem(id)
            {
                for (var key in this.items) {
                    if (this.items[key].id == id) {
                        this.items.splice(key, 1);
                    }
                }
                let uri = `${window.Laravel.baseUrl}/api/items/${id}`
                this.axios.delete(uri);
            }
        }
    }
</script>
