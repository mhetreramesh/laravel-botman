<template>
  <div v-if="user" class="card card-user">
    <div class="image">
      <img src="static/img/background.jpg" alt="...">
    </div>
    <div class="content">
      <div class="author">
        <img class="avatar border-white" :src="user.image" alt="...">
        <h4 class="title">{{user.name}}<i> ({{user.shortname}})</i>
          <br>
          <a href="#">
            <small>{{user.email}}</small>
          </a>
        </h4>
      </div>
      <p class="description text-center">
        <span :class="getSlackIcon(user.slackname)">
          <i class="fa fa-thumbs-up" style="font-size:24px"></i>
        </span>
        <br>
        <span class="badge">{{user.team}}</span>
      </p>
    </div>
    <hr>
    <div class="text-center">
      <div class="row">
        <div v-for="(info,index) in details" :class="getClasses(index)">
          <h5>{{info.title}}
            <br>
            <small>{{info.subTitle}}</small>
          </h5>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import UserListCard from './UserListCard.vue'

  export default {
    data () {
      return {
        user: null,
        details: [
          {
            title: '12',
            subTitle: 'THC Attended'
          },
          {
            title: '22',
            subTitle: 'Questions Answered'
          },
          {
            title: '10',
            subTitle: 'Followers'
          }
        ]
      }
    },
    methods: {
      getClasses (index) {
        var remainder = index % 3
        if (remainder === 0) {
          return 'col-md-3 col-md-offset-1'
        } else if (remainder === 2) {
          return 'col-md-4'
        } else {
          return 'col-md-3'
        }
      },
      getSlackIcon (shortname) {
        return (shortname !== '' ? 'text-success' : 'text-muted')
      }
    },
    mounted: function () {
      this.$root.$on('userChanged', (user) => {
        this.user = user
      })
    }
  }

</script>
<style>
  
</style>
