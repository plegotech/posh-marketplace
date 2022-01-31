<template>

    <div class="col-sm-12">

        <div class="logo">
            <h1>Posh Marketplace</h1>
        </div>

        <div class="login-box">
            <h1>Sign-In</h1>
            <form action="">
                <input type="email" placeholder="Email Address*" >
                <input type="password" placeholder="Password*" >
                <label class="group">
                    <input type="checkbox">
                    Stay Signed In
                </label>

                <router-link to="/admin/dashboard">Forgot Password?</router-link>
                <input type="button" value="LOGIN">
            </form>
        </div>

        <div class="info-login">
            <h2>New to Posh Market?</h2>
            
                            <ul class="signInOpt">
                                <a href="/vendor-login"><li>Vendor Signup</li></a>
                                <a href="/seller-login"><li>Seller Signup</li></a>
                            </ul>
        </div>

    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
