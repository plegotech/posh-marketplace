<template>
    <div class="wrapper">
        <aside>
            <div class="sidebar left ">
                <div class="user-panel">
                    <div class="sidebar-header">
                        <h3>Posh Market</h3>
                    </div>
                </div>
                <ul class="list-sidebar bg-white">

                    <li>
                        <router-link to="/seller/myorders">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">My Orders</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/seller/vendorproducts">
                            <i class="sb-menu-icon manage-vendors"></i>
                            <span class="nav-label">Vendor Products</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="body">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo01"
                        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <ul class="topnav-user">
                        <li>
                            <a href="">
                                <img src="/img/notification-bell.png" class="notify" alt="">
                            </a>
                        </li>
                        <li>
                            <img src="/img/profile.png" class="profile" alt="">

                            <div class="dropdown foruser-pmarket">
                                <div class="userlogined dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                     aria-haspopup="true" aria-expanded="false">
                                    {{ user.first_name }} {{ user.last_name }}
                                </div>
                                <div class="dropdown-menu dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenuButton">
                                    <a href="javascript:void(0)" @click="logout" class="dropdown-item">
                                        <router-link to="/logout">
                                            Logout
                                        </router-link>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: "sellerLayout",
    data() {
        return {
            user: this.$store.state.auth.user
        }
    },
    created() {
        if(this.user.user_type != 'seller') {
            this.$router.push({name: "forbidden"});
        }
    },
    methods: {
        ...mapActions({
            signOut: "auth/logout"
        }),
        async logout() {
            await axios.post('/logout').then(({data}) => {
                this.signOut()
                this.$router.push({name: "login"})
            })
        }
    }
}
</script>
