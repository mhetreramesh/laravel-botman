import Sidebar from './SideBar.vue'

const SidebarStore = {
  showSidebar: false,
  sidebarLinks: [
    {
      name: 'Dashboard',
      icon: 'ti-home',
      path: '/admin/overview'
    },
    {
      name: 'THC',
      icon: 'ti-pulse',
      path: '/admin/thc'
    },
    {
      name: 'THC Templates',
      icon: 'ti-panel',
      path: '/admin/table-list'
    },
    {
      name: 'Users',
      icon: 'ti-user',
      path: '/admin/users'
    },
    {
      name: 'Teams',
      icon: 'ti-flag-alt',
      path: '/admin/teams'
    }
  ],
  displaySidebar (value) {
    this.showSidebar = value
  }
}

const SidebarPlugin = {

  install (Vue) {
    Vue.mixin({
      data () {
        return {
          sidebarStore: SidebarStore
        }
      }
    })

    Object.defineProperty(Vue.prototype, '$sidebar', {
      get () {
        return this.$root.sidebarStore
      }
    })
    Vue.component('side-bar', Sidebar)
  }
}

export default SidebarPlugin
