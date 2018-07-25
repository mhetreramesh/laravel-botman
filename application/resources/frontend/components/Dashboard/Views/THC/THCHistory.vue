<template>
  <div class="card">
    <div class="header">
      <div class="row">
        <h2 class="title col-xs-9">{{title}}</h2>
        <div class="col-xs-3 text-right">
          <router-link :to="{ name: 'CreateTHC' }" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Start Health Check</router-link>
        </div>
      </div>
      <hr>      
    </div>
    <div class="content">
      <ul class="list-unstyled team-members">
          <li class="row" v-for="healthCheck in healthChecks" :class="{ active: isActive(healthCheck) }">
            <router-link :to="{ name: 'ViewTHCDetails', params: { id: healthCheck.id } }">
            <div class="col-xs-9">
              <span class="text-black">{{healthCheck.title}} <small>({{healthCheck.date}})</small></span>
              <br>
              <span class="badge">Team - {{healthCheck.team}}</span> | <span class="badge">Members - {{healthCheck.memeberCount}}</span>
              <br>
            </div>
  
            <div class="col-xs-3 text-right">
              <button class="btn btn-sm btn-success btn-icon">
                <i class="fa fa-angle-double-right" style="font-size: 18px;" title="Slackbot"></i>
              </button>
            </div>
            </router-link>
          </li>
      </ul>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        title: 'Team Health Check',
        healthChecks: [
          {
            id: 1,
            title: '2018-Q2 DEV',
            date: '07-07-2018',
            memeberCount: 24,
            team: 'DEV'
          },
          {
            id: 2,
            title: '2018-Q1 SYSOPS',
            date: '17-03-2018',
            memeberCount: 4,
            team: 'SYSOPS'
          },
          {
            id: 3,
            title: '2017-Q4 DEV',
            date: '12-12-2017',
            memeberCount: 16,
            team: 'DEVPROJ'
          }
        ],
        currentUser: null
      }
    },
    methods: {
      getSlackIcon (shortname) {
        return (shortname !== '' ? 'text-success' : 'text-muted')
      },
      healthCheckChanged (healthCheck) {
        this.currentUser = healthCheck
        this.$root.$emit('healthCheckChanged', healthCheck)
      },
      isActive (healthCheck) {
        return healthCheck === this.currentUser
      }
    }
  }

</script>
<style>
  
</style>
