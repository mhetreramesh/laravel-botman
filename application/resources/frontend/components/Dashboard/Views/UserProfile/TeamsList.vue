<template>
  <div class="card">
    <div class="header">
      <div class="row">
        <h2 class="title col-xs-9">{{title}}</h2>
        <div class="col-xs-3 text-right">
          <a class="color-green" href="#">
            <i class="fa fa-plus-circle fa-3x"></i>
          </a>
        </div>
      </div>
      <hr >
    </div>
    <div class="content">
      <ul class="list-unstyled team-members">
          <li class="row" v-for="team in teams" :class="{ active: isActive(team) }">
            <a href="#" @click="teamChanged(team)">
            <div class="col-xs-9">
              <span class="text-black">{{team.name}} </span>
            </div>
  
            <div class="col-xs-3 text-right">
              <button class="btn btn-sm btn-success btn-icon">
                <i class="fa fa-angle-double-right" style="font-size: 18px;" title="Slackbot"></i>
              </button>
            </div>
            </a>
          </li>
      </ul>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        title: 'TB.Teams',
        teams: [
          {
            id: '1',
            name: 'DEV'
          },
          {
            id: '1',
            name: 'Marketing'
          },
          {
            id: '1',
            name: 'Sales'
          }
        ],
        currentTeam: null
      }
    },
    methods: {
      teamChanged (team) {
        this.currentTeam = team
      },
      isActive (team) {
        return team === this.currentTeam
      }
    }
  }

</script>
<style>
  
</style>
