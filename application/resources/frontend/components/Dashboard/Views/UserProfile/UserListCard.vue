<template>
  <div class="card">
    <div class="header">
      <h2 class="title">{{title}}</h2>
      <hr>
    </div>
    <div class="content">
      <ul class="list-unstyled team-members">
          <li class="row" v-for="user in users" :class="{ active: isActive(user) }"><span class="badge">{{user.team}}</span>
            <a href="#/admin/users?id=1" @click="userChanged(user)">
            <div class="col-xs-3">
              <div class="avatar">
                <img :src="user.image" alt="Circle Image" class="img-circle img-no-padding img-responsive">
              </div>
            </div>
            <div class="col-xs-6">
              <span class="text-black">{{user.name}} <small>({{user.shortname}})</small></span>
              <br>
              <span class="text-info">
                <small>{{user.email}}</small>
              </span>
              <br>
              <span :class="getSlackIcon(user.slackname)">
                <i class="fa fa-thumbs-up" style="font-size:24px"></i>
              </span>
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
        title: 'TB.Users',
        users: [
          {
            image: 'static/img/faces/face-3.jpg',
            name: 'Ramesh M',
            shortname: 'ram',
            email: 'sdsd@tb.com',
            slackname: 'ssdsd',
            team: 'DEV'
          },
          {
            image: 'static/img/faces/face-1.jpg',
            name: 'Sven',
            shortname: 'svt',
            email: 'rer@emdsd.com',
            slackname: '',
            team: 'SYSOPS'
          },
          {
            image: 'static/img/faces/face-2.jpg',
            name: 'Stannis',
            shortname: 'sas',
            email: 'sdjsdj@sdsdsdf.com',
            slackname: 'ss',
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
      userChanged (user) {
        this.currentUser = user
        this.$root.$emit('userChanged', user)
      },
      isActive (user) {
        return user === this.currentUser
      }
    }
  }

</script>
<style>
  
</style>
