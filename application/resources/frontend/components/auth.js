export default {
    getToken () {
        return localStorage.token
    },
    logout () {
        delete localStorage.token
    },
    loggedIn () {
        return this.$cookie.get('test');
    }
}
