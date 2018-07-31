export default {
    getToken () {
        return localStorage.token
    },
    logout () {
        delete localStorage.token
    },
    loggedIn () {
        return document.cookie.indexOf('api_token=');
    }
}
