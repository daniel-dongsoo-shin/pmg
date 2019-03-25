<template>
    <div class="row justify-content-center mt-4">

        <div class="col-8">
            <div v-if="showError" class="bg-danger text-white text-center font-weight-bold p-2 my-2">
                <ul>
                    <li v-for="(val,key) in messages" class="text-left">
                        {{ key+ ": " + val }}
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-header">CREATE ACCOUNT</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <select class="form-control" v-model="user.title">
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Miss</option>
                            <option>Ms</option>
                            <option>Dr</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="user.first_name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="user.last_name">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" v-model="user.mobile">
                    </div>
                    <div class="form-group">
                        <label>Post Code</label>
                        <input type="text" class="form-control" v-model="user.post_code">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" v-model="user.birth_date">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="user.password">
                    </div>
                    <div class="text-left">
                        <input type="checkbox" id="check1" v-model="user.term_of_use">
                        <label for="check1">I agree to terms of use</label>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" v-on:click="register">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    data: function() {
        return {
            user: {},
            showError: false,
            messages: {},
        }
    },
    methods: {
        register(e) {
            //e.preventDefault();
            console.log("register");
            console.log(this.user);
            let self = this;
            Axios.post('/register', {
                email:  this.user.email,
                password: this.user.password,
                first_name: this.user.first_name,
                last_name: this.user.last_name,
                title:  this.user.title,
                mobile: this.user.mobile,
                post_code: this.user.post_code,
                birth_date: this.user.birth_date,
                term_of_use: this.user.term_of_use
            }).then(function (response) {
                console.log(response.data);
                if (response.data.status == '200') {
                    //self.setUser(response.data.user);
                    //self.setAuthenticated();
                    //self.showAuthFailure = false;
                    self.showError = false;
                    self.$router.push('/');
                } else {
                    self.messages = response.data.message;
                    self.showError = true;
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    }

}
</script>
