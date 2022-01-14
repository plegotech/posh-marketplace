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
                        <router-link :to="{ name: 'seller-dashboard'}">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">Dashboard</span>
                        </router-link>
                    </li>
                    <li>
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">Manage Products</span>
                        </a>
                    </li>
                    <li>
                        <router-link :to="{ name: 'seller-order'}">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">My Orders</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'seller-vendor-products'}">
                            <i class="sb-menu-icon manage-vendors"></i>
                            <span class="nav-label">Vendor Products</span>
                        </router-link>
                    </li>
                    <li>
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">Billing</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">Manage Website</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">My Sales</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">My Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
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
