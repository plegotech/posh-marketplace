<template>
    <div class="login-area">
        <div class="container top-log">
            <div class="row">
                <div class="col-sm-12">

                    <div class="logo">
                        <h1>Posh Marketplace</h1>
                    </div>

                    <div class="login-box mb-5">
                        <h1>Reset Password</h1>
                        <form>
                            <input type="email" v-model="form.email" placeholder="Email Address*">
                            <span v-if="error != 0" class="invalidLogin alert alert-danger">{{ this.error }}</span>
                            <button type="submit" :disabled="processing" @click="loginUser" class="primary btn-block">
                                {{ processing ? "Please wait" : "Request Password" }}
                            </button>
                        </form>
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
                password: ''
                // ,
                // _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            error: 0,
            processing:false
        }
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
                    axios.defaults.headers.common['X-CSRF-TOKEN'] = data;
                    this.signIn();
                    setTimeout(() => {
                        switch (this.$store.state.auth.user.user_type) {
                            case "admin":
                                    this.$router.push({name: "dashboard"});
                                break;
                            case "seller":
                                    this.$router.push({name: "seller-dashboard"});
                                break;
                            case "vendor":
                                    this.$router.push({name: "vendor-dashboard"});
                                break;
                        }
                    }, 1500);
                }).catch(({response:{data}})=>{
                    this.error = data.message;
                }).finally(()=>{
                    this.processing = false;
                })
        },
    }
}
</script>
