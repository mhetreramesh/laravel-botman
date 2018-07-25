<template>
    <div class="row">
      <div class="col-lg-9 col-md-8">
        <t-h-c-history>
        </t-h-c-history>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="card">
          <div class="header">
            <h4 class="title col-xs-12">
              All Teams
            </h4>
            <hr >
          </div>
          <div class="content">
            <ul class="list-unstyled team-members">
                <li class="row" v-for="team in teams">
                  <div class="col-xs-12">
                    <span class="text-black">{{team.name}} </span> - <span class="badge">{{team.membersCount}}</span>
                  </div>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
  import TeamsList from './UserProfile/TeamsList.vue'
  import THCHistory from './THC/THCHistory.vue'
  
  export default {
    components: {
      TeamsList,
      THCHistory
    },
    data () {
      return {
        teams: [
          {
            id: '1',
            name: 'DEV',
            membersCount: 24
          },
          {
            id: '1',
            name: 'Marketing',
            membersCount: 5
          },
          {
            id: '1',
            name: 'Sales',
            membersCount: 7
          }
        ]
      }
    }
  }

</script>
<style>

</style>
