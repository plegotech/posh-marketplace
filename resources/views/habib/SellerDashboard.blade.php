        @extends('layouts.app')

        @section('content')
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Work', 8],
    ['Eat', 2],
    ['TV', 4],
    ['Gym', 2],
    ['Sleep', 8]
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {'title':'', 'width':300, 'height':200};

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
    }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses'],
            ['2013',  1000,      400],
            ['2014',  1170,      460],
            ['2015',  660,       1120],
            ['2016',  1030,      540]
            ]);

            var options = {
            title: 'Company Performance',
            hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        </script>
        <template>
            <div class="wrapper">
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
        </template>

                <div class="body">
                <template>
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
                                <img src="/img/mail-icon.png" class="notify" alt="">
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
        </template>
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <div class="box-shadow-wbg">
                                    <div class="d-flex justify-content-between">
                                        <div class="sec-box">
                                            <img src="/img/total-sales-icons.png" width="134" height="80" alt="">
                                            <div class="right-txt">
                                                <span>Seller Orders</span>
                                                <h3>3020</h3>
                                            </div>
                                        </div>
                                        <div class="sec-box">
                                            <img src="/img/pending-orders.png" width="124" height="70"  alt="">
                                            <div class="right-txt">
                                                <span>Pending Orders</span>
                                                <h3>30</h3>
                                            </div>
                                        </div>
                                        <div class="sec-box">
                                            <img src="/img/cancel-icon.png" width="101" height="69"  alt="">
                                            <div class="right-txt">
                                            <span>Cancelled Orders</span>
                                            <h3>10</h3>
                                        </div>
                                        </div>
                                        <div class="sec-box">
                                            <img src="/img/ok-icon.png" width="101" height="69"  alt="">
                                            <div class="right-txt">
                                            <span>Successful Orders</span>
                                            <h3>1500</h3>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">                    
                            <div class="col-sm-8">
                                <div class="box-shadow-wbg">
                                    <h2 class="title-b-inside">Sales Report</h2>
                                    <div class="chart-box-dash">
                                    <div id="chart_div" style="width: 100%; height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box-shadow-wbg">
                                    <h2 class="title-b-inside">Earnings</hh2>
                                    <div class="chart-box-dash">
                                        <div id="piechart" style="width: 100%; height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>              

                        <div class="row">
                            <div class="col-sm-12">
                            <div class="box-shadow-wbg">
                                    <h2 class="title-b-inside">Recent Orders</h2>
                                    <table class="table recent-Orders-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Order Id <img class="shuffle" src="/img/shuffle.png"></th>
                                            <th scope="col">Product <img class="shuffle" src="/img/shuffle.png"></th>
                                            <th scope="col">Tracking Id</th>
                                            <th scope="col">Delivery Date</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Pricing</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col">Shipping Deal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>                                        
                                                <span class="blue-txt">INV - 1001</span>
                                            </td>
                                            <td>
                                                <span>Nike Shoes</span>
                                            </td>
                                            <td>
                                                <span>MRP0043456</span>
                                            </td>
                                            <td>
                                                <span>05/10/2019</span>
                                            </td>
                                            <td>
                                                <span>3</span>
                                            </td>
                                            <td>
                                                <span>$2,350.00</span>
                                            </td>
                                            <td>
                                                <span class="comleted-txt">Completed</span>
                                            </td>
                                            <td>
                                                <span>Credit Card</span>
                                            </td>
                                            <td>
                                                <span>Chicago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>                                        
                                                <span class="blue-txt">INV - 1001</span>
                                            </td>
                                            <td>
                                                <span>Nike Shoes</span>
                                            </td>
                                            <td>
                                                <span>MRP0043456</span>
                                            </td>
                                            <td>
                                                <span>05/10/2019</span>
                                            </td>
                                            <td>
                                                <span>3</span>
                                            </td>
                                            <td>
                                                <span>$2,350.00</span>
                                            </td>
                                            <td>
                                                <span class="comleted-txt">Completed</span>
                                            </td>
                                            <td>
                                                <span>Credit Card</span>
                                            </td>
                                            <td>
                                                <span>Chicago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>                                        
                                                <span class="blue-txt">INV - 1001</span>
                                            </td>
                                            <td>
                                                <span>Nike Shoes</span>
                                            </td>
                                            <td>
                                                <span>MRP0043456</span>
                                            </td>
                                            <td>
                                                <span>05/10/2019</span>
                                            </td>
                                            <td>
                                                <span>3</span>
                                            </td>
                                            <td>
                                                <span>$2,350.00</span>
                                            </td>
                                            <td>
                                                <span class="comleted-txt">Completed</span>
                                            </td>
                                            <td>
                                                <span>Credit Card</span>
                                            </td>
                                            <td>
                                                <span>Chicago</span>
                                            </td>
                                        </tr>
                                        <tr class="ifpending-bx">
                                            <td>                                        
                                                <span class="blue-txt">INV - 1001</span>
                                            </td>
                                            <td>
                                                <span>Nike Shoes</span>
                                            </td>
                                            <td>
                                                <span>MRP0043456</span>
                                            </td>
                                            <td>
                                                <span>05/10/2019</span>
                                            </td>
                                            <td>
                                                <span>3</span>
                                            </td>
                                            <td>
                                                <span>$2,350.00</span>
                                            </td>
                                            <td>
                                                <span class="pendig-txt">Pending</span>
                                            </td>
                                            <td>
                                                <span>Bank Transfer</span>
                                            </td>
                                            <td>
                                                <span>Chicago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>                                        
                                                <span class="blue-txt">INV - 1001</span>
                                            </td>
                                            <td>
                                                <span>Nike Shoes</span>
                                            </td>
                                            <td>
                                                <span>MRP0043456</span>
                                            </td>
                                            <td>
                                                <span>05/10/2019</span>
                                            </td>
                                            <td>
                                                <span>3</span>
                                            </td>
                                            <td>
                                                <span>$2,350.00</span>
                                            </td>
                                            <td>
                                                <span class="comleted-txt">Completed</span>
                                            </td>
                                            <td>
                                                <span>Credit Card</span>
                                            </td>
                                            <td>
                                                <span>Chicago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>                                        
                                                <span class="blue-txt">INV - 1001</span>
                                            </td>
                                            <td>
                                                <span>Nike Shoes</span>
                                            </td>
                                            <td>
                                                <span>MRP0043456</span>
                                            </td>
                                            <td>
                                                <span>05/10/2019</span>
                                            </td>
                                            <td>
                                                <span>3</span>
                                            </td>
                                            <td>
                                                <span>$2,350.00</span>
                                            </td>
                                            <td>
                                                <span class="comleted-txt">Completed</span>
                                            </td>
                                            <td>
                                                <span>Credit Card</span>
                                            </td>
                                            <td>
                                                <span>Chicago</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        
                            
                        </div>

                    </div>
                </div>
            </div>
        </template>
        @endsection

