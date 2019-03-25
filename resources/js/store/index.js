import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const loginUrl = "/login";
const registerUrl = "/"

export default new Vuex.Store({
    strict: true,   // data read-only, modified by mutations only.
    state: {
        over18: false,
        authenticated: false,
        user: {
            id: 0,
            name: '',
            email: '',
        }
    },
    mutations: {
        setUser(state, data) {
            console.log("setUser:");
            console.log(data);
            state.user.name = data['first_name'] + " " + data['last_name'];
            state.user.email = data['email'];
            state.user.id = data['id'];
        },
        setAuthenticated(state) {
            state.authenticated = true;
        },
        clearAuthentication(state) {
            state.authenticated = false;
        },
        setOver18(state) {
            state.over18 = true;
        },
        clearOver18(state) {
            state.over18 = false;
        },
    }
});