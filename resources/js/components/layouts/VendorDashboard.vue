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
                        <router-link :to="{ name: 'vendor-dashboard'}">
                            <i class="sb-menu-icon overview-icon"></i>
                            <span class="nav-label">Overview</span>
                        </router-link>
                    </li>
                    <li class="sub-menu">
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">Manage Categories <i><img class="arrow" src="/img/menu-icons/arrow-down.png"
                                                                      alt=""></i> </span>
                            <ul>
                                <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                                   <router-link :to="{ name: 'vendor-categories'}">
                                        Category List
                                    </router-link>
                                </li>
                                <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                                    <router-link :to="{ name: 'vendor-subcategories'}">
                                        Sub Category List
                                    </router-link>
                                </li>
                            </ul>
                        </a>
                    </li>
                    <!-- <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'vendor-categories'}">
                            <i class="sb-menu-icon manage-products"></i>
                            <span class="nav-label">Manage Categories</span>
                        </router-link>
                    </li> -->
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'vendor-manage-products'}">
                            <i class="sb-menu-icon manage-products"></i>
                            <span class="nav-label">Manage Products</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
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
                                <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                                    <router-link :to="{ name: 'vendor-orders-pending'}">
                                        Pending Orders
                                    </router-link>
                                </li>
                                <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                                    <router-link :to="{ name: 'vendor-orders-in-progress'}">
                                        In-Progress Orders
                                    </router-link>
                                </li>
                                <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                                    <router-link :to="{ name: 'vendor-all-orders'}">
                                        Completed
                                    </router-link>
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'vendor-billing'}">
                            <i class="sb-menu-icon billing-icon"></i>
                            <span class="nav-label">Billing</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'vendor-product-history'}">
                            <i class="sb-menu-icon product-history"></i>
                            <span class="nav-label">Product History</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'vendor-shipping'}">
                            <i class="sb-menu-icon shipping-icon"></i>
                            <span class="nav-label">Shipping</span>
                        </router-link>
                    </li>
                    <li data-toggle="collapse" data-target="#navbarTogglerSidebar" aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <router-link :to="{ name: 'vendor-profile'}">
                            <i class="sb-menu-icon my-profile"></i>
                            <span class="nav-label">My Profile</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
        <div class="body">
            <Navbar :first_name="user.first_name" :last_name="user.last_name"   :user_id="user.id"/>
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
