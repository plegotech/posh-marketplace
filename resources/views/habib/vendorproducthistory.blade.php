@extends('layouts.app')

@section('content')
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
                                    <i class="sb-menu-icon manage-products"></i>
                                    <span class="nav-label">Manage Products</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/manage-sellers">
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
                                            <router-link to="/admin/seller-orders">
                                                Pending Orders
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link to="/admin/vendor-orders">
                                                In-Progress Orders
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link to="/admin/vendor-orders">
                                                All Orders
                                            </router-link>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li>
                                <router-link to="/admin/payment-details">
                                    <i class="sb-menu-icon billing-icon"></i>
                                    <span class="nav-label">Billing</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/payment-details">
                                    <i class="sb-menu-icon product-history"></i>
                                    <span class="nav-label">Product History</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/payment-history">
                                    <i class="sb-menu-icon shipping-icon"></i>
                                    <span class="nav-label">Shipping</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/admin/payment-history">
                                    <i class="sb-menu-icon my-profile"></i>
                                    <span class="nav-label">My Profile</span>
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
                                        <img src="/img/mail-icon.png" class="notify" alt=""><span class="numberof-ma">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/img/notification-bell.png" class="notify" alt="">
                                    </a>
                                </li>
                                <li>
                                    <img src="/img/profile.png" class="profile" alt="">

                                    <div class="dropdown foruser-pmarket">
                                        <div class="userlogined dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            John Doe
                                        </div>
                                        <div class="dropdown-menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>

@endsection
