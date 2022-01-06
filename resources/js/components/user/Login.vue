<template>
    <div class="login-area">
        <div class="container top-log">
            <div class="row">
                <div class="col-sm-12">

                    <div class="logo">
                        <h1>Posh Marketplace</h1>
                    </div>

                    <div class="login-box">
                        <h1>Sign-In</h1>
                        <form>
                            <input type="email" v-model="form.email" placeholder="Email Address*">
                            <input type="password" v-model="form.password" placeholder="Password*">
                            <span class="invalidLogin alert alert-danger"
                                  style="display: none">Invalid login details</span>
                            <label class="group">
                                <input type="checkbox">
                                Stay Signed In
                            </label>

                            <router-link to="/admin/dashboard">Forgot Password?</router-link>
                            <input type="submit" @click="loginUser()" value="LOGIN">
                        </form>
                    </div>

                    <div class="info-login">
                        <h2>New to Posh Market?</h2>
                        <ul>
                            <li>
                                <router-link to="/">Vendor Signup</router-link>
                            </li>
                            <li>
                                <router-link to="/">Seller Signup</router-link>
                            </li>
                            <li>
                                <router-link to="/">User Signup</router-link>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid bottom-log">
            <div class="row">
                <div class="col-sm-12">
                    <p>Copyright © 2021 Posh Market, Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            errors: []
        }
    },
    created() {
        this.checkAuth();
        console.log('Component mounted.')
    },
    methods: {
        loginUser() {
            axios.post('/api/login', this.form)
                .then(() => {
                    this.$router.push({name: "Dashboard"});
                }).catch((error) => {
                document.getElementsByClassName('invalidLogin')[0].style.display = 'block';
                // this.errors = error.response.data.errors;
            })
        },
        checkAuth() {
            axios.get('/api/athenticated', this.form)
                .then(() => {
                    this.$router.push({name: "Dashboard"});
                }).catch((error) => {
                this.errors = error.response.data.errors;
            })
        },
    }
}
</script>
