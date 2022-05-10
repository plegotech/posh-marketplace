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
                <div class="container-fluid pending-vend">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <div class="top-newOrder myorder">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <div class="search-box" style="max-width:100%">
                                        <form action="">
                                            <img src="/img/search-icon.png" class="search-icon" alt="">
                                            <input type="text" class="search_BX">
                                            <img src="/img/close-srch.png" class="close-icon" alt="">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="row">
                                        <div class="col">
                                            <select name="" id="">
                                                <option value="" selected>Sort By</option>
                                                <option value="">Name</option>
                                                <option value="">Number</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="" id="">
                                                <option value="" selected>Category</option>
                                                <option value="">one</option>
                                                <option value="">two</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="" id="">
                                                <option value="" selected>Sub Category</option>
                                                <option value="">one</option>
                                                <option value="">two</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="" id="">
                                                <option value="" selected>All</option>
                                                <option value="">one</option>
                                                <option value="">two</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                    <!-- START:: Products listing -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                            <div class="product-img-bx">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END  :: Products listing -->
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-center">
                        <div aria-label="Page navigation example">
                            <ul class="pagination bottm-pagination">
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&#8603;</span>
                                </a>
                                </li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
                       
@endsection
