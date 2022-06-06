<template>
    <div class="wrapper">
        <div class="navbar-expand-lg">
        <aside class="collapse navbar-collapse" id="navbarTogglerSidebar">
            <div class="sidebar left ">
                <div class="user-panel">
                    <div class="sidebar-header navbar-dark">
                        <h3>Posh Market</h3>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarTogglerSidebar"
                            aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="/img/close.png" alt="" class="closetag-menu">
                            <!-- <span class="navbar-toggler-icon"></span> -->
                        </button>
                    </div>
                </div>
                <ul class="list-sidebar bg-white">
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-dashboard'}">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">Dashboard</span>
                        </router-link>
                    </li>
                    <!--<li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-manage-products'}">
                            <i class="sb-menu-icon manage-products"></i>
                            <span class="nav-label">Manage Products</span>
                        </router-link>
                    </li>-->
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-order'}">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">My Orders</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-vendor-products'}">
                            <i class="sb-menu-icon manage-vendors"></i>
                            <span class="nav-label">Vendor Products</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-billing'}">
                            <i class="sb-menu-icon billing-icon"></i>
                            <span class="nav-label">Billing</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-manage-website'}">
                            <i class="sb-menu-icon maintenance-icon"></i>
                            <span class="nav-label">Manage Website</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-sales'}">
                            <i class="sb-menu-icon manage-sellers"></i>
                            <span class="nav-label">My Sales</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'seller-profile'}">
                            <i class="sb-menu-icon my-profile"></i>
                            <span class="nav-label">My Profile</span>
                        </router-link>
                    </li>
                </ul>
         </div>
        </aside>
        </div>
        <div class="body">
            <Navbar :first_name="user.first_name" :last_name="user.last_name"/>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
import Navbar from '../Navbar'

export default {
    components : {
        'Navbar': Navbar
    },
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
