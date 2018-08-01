export default {
    getToken () {
        return localStorage.getItem('testObject')
    },
    logout () {
        localStorage.clear();
    },
    loggedIn () {
        return localStorage.getItem('api_token')
    }
}
