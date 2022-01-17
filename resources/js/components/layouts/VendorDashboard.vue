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
                        <router-link :to="{ name: 'vendor-dashboard'}">
                            <i class="sb-menu-icon overview-icon"></i>
                            <span class="nav-label">Overview</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'vendor-manage-products'}">
                            <i class="sb-menu-icon manage-products"></i>
                            <span class="nav-label">Manage Products</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'vendor-upload-products'}">
                            <i class="sb-menu-icon upload-product"></i>
                            <span class="nav-label">Upload Product</span>
                        </router-link>
                    </li>
                    <li class="sub-menu">
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">My Orders <i><img class="arrow" src="/img/menu-icons/arrow-down.png"
                                                                      alt=""></i> </span>
                            <ul>
                                <li>
                                    <router-link :to="{ name: 'vendor-orders-pending'}">
                                        Pending Orders
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{ name: 'vendor-orders-in-progress'}">
                                        In-Progress Orders
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{ name: 'vendor-dashboard'}">
                                        All Orders
                                    </router-link>
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li>
                        <router-link :to="{ name: 'vendor-billing'}">
                            <i class="sb-menu-icon billing-icon"></i>
                            <span class="nav-label">Billing</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'vendor-dashboard'}">
                            <i class="sb-menu-icon product-history"></i>
                            <span class="nav-label">Product History</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'vendor-shipping'}">
                            <i class="sb-menu-icon shipping-icon"></i>
                            <span class="nav-label">Shipping</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'vendor-profile'}">
                            <i class="sb-menu-icon my-profile"></i>
                            <span class="nav-label">My Profile</span>
                        </router-link>
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
    components: {
        'Navbar': Navbar
    },
    name: "vendorLayout",
    data() {
        return {
            user: this.$store.state.auth.user
        }
    },
    created() {
        if (this.user.user_type != 'vendor') {
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
