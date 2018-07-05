<template>
  <div>
    <h1>Create An Article</h1>
    <form v-on:submit.prevent="addItem">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="item.name" required />
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Price</label>
              <input type="number" class="form-control col-md-6" v-model="item.price"  required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>SKU</label>
              <input type="text" class="form-control col-md-6" v-model="item.sku" required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>EAN</label>
              <input type="text" class="form-control col-md-6" v-model="item.ean" required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" class="form-control col-md-6" v-model="item.quantity" numeric required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 offset-2">
            <div class="form-group1212">
              <label>Categories</label>
              <multiselect
                v-model="item.categories"
                :options="categories"
                :multiple="true"
                track-by="id"
                :custom-label="customLabel">
              </multiselect>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary"><i class="fa fa-save"></i> Add Article</button>
          <router-link :to="{ name: 'DisplayItem' }" class="btn btn-default pull-right">Cancel</router-link>
        </div>
    </form>
  </div>
</template>
<script>
  import Multiselect from 'vue-multiselect'
  export default {
    components: { Multiselect },
    data(){
        return{
          item:{},
          categories: []
        }
    },

    created: function()
    {
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
      addItem(){
        let uri = `${window.Laravel.baseUrl}/api/items`
        this.axios.post(uri, this.item).then((response) => {
          this.$router.push({path: '/'})
        })
    }
  }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>