@extends('layouts.app')

@section('content')
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
                        <i><img src="{{ asset('img/menu-icons/overview.png') }}" alt=""></i>
                        <span class="nav-label">Overview</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/manage-vendors">
                        <i><img src="{{ asset('img/menu-icons/manage-vendors.png') }}" alt=""></i>
                        <span class="nav-label">Manage Vendors</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/manage-sellers">
                        <i><img src="{{ asset('img/menu-icons/manage-sellers.png') }}" alt=""></i>
                        <span class="nav-label">Manage Sellers</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/pending-vendor-signups">
                        <i><img src="{{ asset('img/menu-icons/pending-vendor-signups.png') }}" alt=""></i>
                        <span class="nav-label">Pending Vendor Signups</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/pending-seller-signups">
                        <i><img src="{{ asset('img/menu-icons/pending-seller-signups.png') }}" alt=""></i>
                        <span class="nav-label">Pending Seller Signups</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/manage-users">
                        <i><img src="{{ asset('img/menu-icons/manage-users.png') }}" alt=""></i>
                        <span class="nav-label">Manage Users</span>
                    </router-link>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i><img src="{{ asset('img/menu-icons/orders.png') }}" alt=""></i>
                        <span class="nav-label">Orders <i><img class="arrow" src="{{ asset('img/menu-icons/arrow-down.png') }}"
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
                        <i><img src="{{ asset('img/menu-icons/Reports.png') }}" alt=""></i>
                        <span class="nav-label">Reports <i><img class="arrow" src="{{ asset('img/menu-icons/arrow-down.png') }}"
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
                        <i class="fa fa-laptop"></i>
                        <span class="nav-label">Payment Details</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/payment-history">
                        <i><img src="{{ asset('img/menu-icons/payment-history.png') }}" alt=""></i>
                        <span class="nav-label">Payment History</span>
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
                <ul>
                    <li>
                        <a href="">
                            <img src="{{ asset('/img/notification-bell.png') }}" class="notify" alt="">
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('/img/profile.png') }}" class="profile" alt="">
                        <select name="" id="">
                            <option value="John Doe" selected>John Doe</option>
                            <option value="">John JJ</option>
                            <option value="">John KK</option>
                        </select>
                    </li>
                </ul>
            </div>
        </nav>

        <router-view></router-view>
    </div>
@endsection
