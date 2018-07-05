<template>
  <div>
    <h1>Create Category</h1>
    <form v-on:submit.prevent="addCategory">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Parent Category</label>
            <select v-model="category.parent_id" class="form-control">
              <option v-for="tmpCategory in categories" v-bind:value="tmpCategory.id">
                  {{ tmpCategory.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label>Category Name:</label>
            <input type="text" class="form-control" v-model="category.name" required>
          </div>
        </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary"><i class="fa fa-save"></i> Add Category</button>
          <router-link :to="{ name: 'DisplayCategory' }" class="btn btn-default pull-right">Cancel</router-link>
        </div>
    </form>
  </div>
</template>
<script>
  export default {
    data(){
        return{
          category:{},
          categories: [
            { name: 'Select', id: '' }
          ]
        }
    },

    created: function()
    {
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
      addCategory(){
        let uri = `${window.Laravel.baseUrl}/api/categories`;
        this.axios.post(uri, this.category).then((response) => {
          this.$router.push({path: '/categories'})
        })
    }
  }
}
</script>
