<template>
    <div class="row">
      <div class="col-md-3">
        <teams-list></teams-list>
      </div>
      <div class="col-md-4">
        <user-list-card></user-list-card>
      </div>
      <div class="col-md-5">
       <user-card></user-card>
      </div>
    </div>
</template>
<script>
  import TeamsList from './UserProfile/TeamsList.vue'
  import UserCard from './UserProfile/UserCard.vue'
  import UserListCard from './UserProfile/UserListCard.vue'

  export default {
    components: {
      UserCard,
      UserListCard,
      TeamsList
    }
  }

</script>
<style>

</style>
