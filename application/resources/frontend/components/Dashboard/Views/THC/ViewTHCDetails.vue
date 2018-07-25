<template>
  <div class="row">
      <div class="col-md-6">
        <topics-list></topics-list>
      </div>
      <div class="col-md-6">
       <topic-details></topic-details>
      </div>
    </div>
</template>
<script>
  import TopicsList from './TopicsList.vue'
  import TopicDetails from './TopicDetails.vue'

  export default {
    components: {
      TopicsList,
      TopicDetails
    }
  }
</script>
<style>

</style>
