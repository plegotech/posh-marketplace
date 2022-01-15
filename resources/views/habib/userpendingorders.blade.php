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
                                                All Orders
                                            </router-link>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li>
                                <router-link to="/admin/payment-details">
                                    <i class="sb-menu-icon track-order-icon"></i>
                                    <span class="nav-label">Track My Order</span>
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
                                        <img src="/img/buying-icon.png" class="notify" alt="">
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
                <div class="container-fluid pending-vend">
                <div class="box-shadow-wbg top-newOrder mt-3">
                    <div class="row">
                    <div class="col-sm-4 mb-4">
                        <div class="search-box float-left">
                            <img src="/img/search-icon.png" alt="" class="search-icon"> 
                            <input type="text" class="search_BX pendingVendorSearch"> 
                            <img src="/img/close-srch.png" alt="" class="close-icon">
                        </div>
                    </div>
                        <div class="col-sm-12">
                            
                                <table class="table recent-Orders-table">
                                    <thead>
                                    <tr>
                                    <th scope="col" class="shuffle-bx"><span class="sort-ad">Order Id <img src="/img/shuffle.png" class="shuffle"></span></th>
                                    <th scope="col" class="shuffle-bx"><span class="sort-ad">Recipient <img src="/img/shuffle.png" class="shuffle"></span></th>
                                    <th scope="col" class="shuffle-bx"><span class="sort-ad">Delivery Date <img src="/img/shuffle.png" class="shuffle"></span></th>
                                        <th scope="col">Shipping Details</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>03/26/2021</span>
                                        </td>
                                        <td>
                                            <span>4949, Forecast Ave</span>
                                        </td>
                                        <td>
                                        <span class="pendig-txt">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>03/26/2021</span>
                                        </td>
                                        <td>
                                            <span>4949, Forecast Ave</span>
                                        </td>
                                        <td>
                                        <span class="pendig-txt">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>03/26/2021</span>
                                        </td>
                                        <td>
                                            <span>4949, Forecast Ave</span>
                                        </td>
                                        <td>
                                        <span class="pendig-txt">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>03/26/2021</span>
                                        </td>
                                        <td>
                                            <span>4949, Forecast Ave</span>
                                        </td>
                                        <td>
                                        <span class="pendig-txt">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>03/26/2021</span>
                                        </td>
                                        <td>
                                            <span>4949, Forecast Ave</span>
                                        </td>
                                        <td>
                                            <span class="pendig-txt">Pending</span>
                                        </td>
                                    </tr>
                                   
                                    </tbody>

                                </table>
                                <div class="foot-table" >
                                    <div class="left"><span>Rows Per Page:
                                            <select >
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select>
                                            </span></div>
                                            <div class="right"><span>1-25 of 81 Items</span> <img src="/img/prev-arrow.png" alt="" class="prev-itm"> <img src="/img/next-arrow.png" alt="" class="next-itm"></div>
                                <!-- END: TABLE   -->
                            </div>
                            <!-- END::: FIRST TAB CONTENT -->
                        </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
@endsection
