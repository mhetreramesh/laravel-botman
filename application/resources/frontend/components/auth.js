import cookie from 'vue-cookie'

export default {
    getToken () {
        return cookie.get('api_token')
    },
    logout () {
        return cookie.delete('api_token')
    },
    loggedIn () {
        return cookie.get('api_token')
    }
}
