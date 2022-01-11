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
                        <router-link to="/admin/dashboard">
                            <i class="sb-menu-icon overview-icon"></i>
                            <span class="nav-label">Overview</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/manage-vendors">
                            <i class="sb-menu-icon manage-vendors"></i>
                            <span class="nav-label">Manage Vendors</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/manage-sellers">
                            <i class="sb-menu-icon manage-sellers"></i>
                            <span class="nav-label">Manage Sellers</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/pending-vendor-signups">
                            <span class="pending-number-bx">{{ pending_vendors }}</span> <i
                            class="sb-menu-icon pending-vendor-signups"></i>
                            <span class="nav-label">Pending Vendor Signups</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/pending-seller-signups">
                            <span class="pending-number-bx">{{ pending_sellers }}</span> <i
                            class="sb-menu-icon pending-seller-signups"></i>
                            <span class="nav-label">Pending Seller Signups</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/manage-users">
                            <i class="sb-menu-icon manage-users"></i>
                            <span class="nav-label">Manage Users</span>
                        </router-link>
                    </li>
                    <li class="sub-menu">
                        <a href="#">
                            <i class="sb-menu-icon orders"></i>
                            <span class="nav-label">Orders <i><img class="arrow" src="/img/menu-icons/arrow-down.png"
                                                                   alt=""></i> </span>
                            <ul>
                                <li>
                                    <router-link to="/admin/seller-orders">
                                        Seller Orders
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/vendor-orders">
                                        Vendors Orders
                                    </router-link>
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="#">
                            <i class="sb-menu-icon reports"></i>
                            <span class="nav-label">Reports <i><img class="arrow" src="/img/menu-icons/arrow-down.png"
                                                                    alt=""></i> </span>
                            <ul>
                                <li>
                                    <router-link to="/admin/seller-reports">
                                        Seller Reports
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/vendor-reports">
                                        Vendor Reports
                                    </router-link>
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li>
                        <router-link to="/admin/payment-details">
                            <i class="sb-menu-icon payment-details"></i>
                            <span class="nav-label">Payment Details</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/payment-history">
                            <i class="sb-menu-icon payment-history"></i>
                            <span class="nav-label">Payment History</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="body">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="clearfix" style="display:none">
                    <div class="spinner-border float-right" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo01"
                        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <div class="topsearch-bx">
                        <img src="/img/search-icon.png" alt="" class="search-icon">
                        <input type="text" data-type="pending" class="topheadSearch">
                        <img src="/img/close.png" alt="" class="close-icon">
                    </div>
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
    name: "dashboardLayout",
    data() {
        return {
            user: this.$store.state.auth.user,
            pending_sellers: 0,
            pending_vendors: 0
        }
    },
    created() {
        this.adminDashboardIterate();
        if(this.user.user_type != 'admin') {
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
                // window.location.href = window.location.origin;
            })
        },
        adminDashboardIterate() {
            this.adminDashboard();
            setInterval(this.adminDashboard, 60000);
        },
        adminDashboard() {
            fetch('/api/admin-data')
                .then(res => res.json())
                .then(res => {
                    this.pending_sellers = res.pending_sellers;
                    this.pending_vendors = res.pending_vendors;
                })
                .catch(err => console.log(err));
        }
    }
}
</script>
