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
                            <span v-if="error != 0" class="invalidLogin alert alert-danger">{{ this.error }}</span>
                            <label class="group">
                                <input type="checkbox">
                                Stay Signed In
                            </label>

                            <router-link to="/admin/dashboard">Forgot Password?</router-link>
                            <button type="submit" :disabled="processing" @click="loginUser" class="primary btn-block">
                                {{ processing ? "Please wait" : "Login" }}
                            </button>
                        </form>
                    </div>

                    <div class="info-login">
                        <h2>New to Posh Market?</h2>
                        <ul>
                            <li>
                                <router-link :to="{ name: 'vendor-signup' }">Vendor Signup</router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'seller-signup' }">Seller Signup</router-link>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid bottom-log">
            <div class="row">
                <div class="col-sm-12">
                    <p>Copyright © {{ new Date().getFullYear() }} Posh Market, Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    data() {
        return {
            form: {
                email: '',
                password: '',
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            error: 0,
            processing:false
        }
    },
    created() {
        // this.checkAuth();
    },
    methods: {
        ...mapActions({
            signIn:'auth/login'
        }),
        async loginUser() {
            this.processing = true
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/login', this.form)
                .then(({data}) => {
                    this.signIn();
                    setTimeout(() => {
                        this.$router.push({name: "dashboard"});
                    }, 1500);
                    this.error = data.error;
                }).catch(({response:{data}})=>{
                    this.error = data.error;
                }).finally(()=>{
                    this.processing = false;
                })
        },
        checkAuth() {
            axios.get('/api/athenticated', this.form)
                .then(() => {
                    this.$router.push({name: "Dashboard"});
                }).catch((error) => {
                this.error = error.response.data.errors;
            })
        },
    }
}
</script>
