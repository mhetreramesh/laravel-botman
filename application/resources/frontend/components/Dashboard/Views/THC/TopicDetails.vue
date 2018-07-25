<template>
  <div v-if="topic" class="card">
    <div class="header">
      <h3 class="title">{{topic.name}}</h3> <hr>
    </div> 
    <div class="content">
      <ul class="list-unstyled team-members">
        <li class="row">
          <div class="col-xs-9">
            <span class="text-black">Mission</span>
          </div> 
          <div class="col-xs-3 text-right">
            <button class="btn btn-sm btn-success btn-icon">12</button>
          </div>
        </li>
        </ul>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      topic: null
    }
  },
  methods: {
  },
  mounted: function () {
    this.$root.$on('topicChanged', topic => {
      this.topic = topic
    })
  }
}
</script>
<style>
</style>
