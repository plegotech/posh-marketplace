<template>
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
                        <span class="pending-number-bx">23</span> <i class="sb-menu-icon pending-vendor-signups"></i>
                        <span class="nav-label">Pending Vendor Signups</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/pending-seller-signups">
                        <span class="pending-number-bx">23</span> <i class="sb-menu-icon pending-seller-signups"></i>
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
</template>
