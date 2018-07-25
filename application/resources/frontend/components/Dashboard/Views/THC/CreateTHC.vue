<template>
  <div class="card">
    <div class="header">
      <h4 class="title">Start THC</h4>
    </div>
    <div class="content">
      <form>
        <div class="row form-group">
          <div class="col-md-3">
            <fg-input type="text"
                      label="Title"
                      placeholder="2018-Q2 - DEV Team"
                      v-model="healthCheck.title">
            </fg-input>
          </div>
          <div class="col-md-3">
            <label>Team</label>
            <select class="form-control form-control-sm" v-model="healthCheck.team">
              <option v-for="team in teams" v-bind:value="team.id">
                {{ team.name }}
              </option>
            </select>
          </div>
          <div class="col-md-3">
            <label>Templates</label>
            <select class="form-control form-control-sm" v-model="healthCheck.template">
              <option v-for="template in templates" v-bind:value="template.id">
                {{ template.name }}
              </option>
            </select>
          </div>
          <div class="col-md-3">
            <fg-input type="text"
                      label="Conductor"
                      placeholder="Niklas Heer"
                      v-model="healthCheck.conductor">
            </fg-input>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd" @click.prevent="saveTHC">
            Start Team Health Check
          </button>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        healthCheck: {
          title: 'Q2-2018 Dev Team',
          team: 1,
          conductor: 'Niklas',
          template: 2
        },
        teams: [
          {
            id: 1,
            name: 'DEV'
          },
          {
            id: 2,
            name: 'Marketing'
          },
          {
            id: 3,
            name: 'Sales'
          }
        ],
        templates: [
          {
            id: 1,
            name: 'DEV-2018'
          },
          {
            id: 2,
            name: 'DEV-2018'
          }
        ]
      }
    },
    methods: {
      saveTHC () {
        alert('Your data: ' + JSON.stringify(this.healthCheck))
      }
    }
  }

</script>
<style>

</style>
