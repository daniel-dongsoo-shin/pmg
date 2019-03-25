<template>
    <div class="row justify-content-center mt-4">
        <div class="col-5">
            <p v-if="showOver18" class="bg-danger text-white text-center font-weight-bold p-2 my-2">
                Your age should be over 18 to login as a guest.
            </p>
            <div class="card pb-4">
                <div class="card-header">Year of Birth</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" v-model="birth_year">
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" v-on:click="checkOver18">Continue</button>
                </div>
            </div>
        </div>

        <div class="col-5">
            <p v-if="showAuthFailure" class="bg-danger text-white text-center font-weight-bold p-2 my-2">
                Authentication Failed. Please try again.
            </p>

            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="password">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" v-on:click="logIn">Log In</button>
                    </div>
                </div>
                <router-link class="nav-item" to="/register">
                    <a class="nav-link">Register for a new account</a>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";
import { mapMutations } from "vuex";

export default {
    data: function() {
        return {
            email: "",
            password: "",
            showAuthFailure: false,
            birth_year: 0,
            current_year: 0,
            showOver18: false,
        }
    },
    computed: {
        isOver18() {
            console.log("Current: " + this.current_year);
            console.log("Birth: " + this.birth_year);
            return ((this.current_year - this.birth_year ) > 18)
        }
    },
    methods: {
        ...mapMutations([
            "setUser",
            "setAuthenticated",
            "clearAuthentication",
            "setOver18",
            "clearOver18",
        ]),
        logIn(e) {
            //e.preventDefault();
            console.log("Login");
            let self = this;
            Axios.post('/login',{
                email: this.email,
                password: this.password
            }).then(function (response) {
                console.log(response.data);
                if (response.data.status == '200') {
                    self.setUser(response.data.user);
                    self.setAuthenticated();
                    self.showAuthFailure = false;
                    self.$router.push('/main');
                } else {
                    self.clearAuthentication();
                    self.showAuthFailure = true;
                }
            }).catch(function (error) {
                //console.log(error);
                self.clearAuthentication();
                self.showAuthFailure = true;
            });
        },
        checkOver18() {
            console.log("checkOver18:");
            console.log(this.isOver18);
            if (this.isOver18) {
                this.setOver18();
                this.$router.push('/main');
            } else {
                this.showOver18 = true;
                this.clearOver18();
            }
        }
    },
    created: function() {
        let dt = new Date();
        this.birth_year = dt.getFullYear();
        this.current_year = dt.getFullYear();
    }

}
</script>
