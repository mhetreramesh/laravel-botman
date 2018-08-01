import Sidebar from './SideBar.vue'

const SidebarStore = {
  showSidebar: false,
  sidebarLinks: [
    {
      name: 'Dashboard',
      icon: 'fa fa-home',
      path: '/admin/overview'
    },
    {
      name: 'THC',
      icon: 'fa fa-universal-access',
      path: '/admin/thc'
    },
    {
      name: 'THC Templates',
      icon: 'fa fa-braille',
      path: '/admin/table-list'
    },
    {
      name: 'Users',
      icon: 'fa fa-user',
      path: '/admin/users'
    },
    {
      name: 'Teams',
      icon: 'fa fa-group',
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
