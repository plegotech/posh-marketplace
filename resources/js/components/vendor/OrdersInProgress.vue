<template>
    <div class="container-fluid pending-vend">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <div class="top-newOrder mb-4">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="inpro-order-detail">
                                <table class=" tablebg-inpro">
                                    <tbody>
                                    <tr>
                                        <td>Order Id:</td><td>ANK 1250</td>
                                    </tr>
                                    <tr>
                                        <td>Order Date:</td><td>09/29/2021</td>
                                    </tr>
                                    <tr>
                                        <td>Ship Date:</td><td>10/06/2021</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Address:</td><td>10/06/2021</td>
                                    </tr>
                                    <tr>
                                        <td>Carrier:</td><td>US Postal Service</td>
                                    </tr>
                                    <tr>
                                        <td>Carrier Tracking Number:</td><td>US Postal Service</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="search-box mb-4">
                                <img src="/img/search-icon.png" class="search-icon" alt="">
                                <input type="text" class="search_BX pendingVendorSearch">
                                <img src="/img/close-srch.png" class="close-icon" alt="">
                            </div>

                            <div class="order-progress-ar">
                                <div class="opar-bx">
                                    <!-- start:: -->
                                    <div class="stepper-wrapper">
                                        <div class="stepper-item completed">
                                            <div class="step-counter"></div>
                                            <div class="step-name">Received</div>
                                        </div>
                                        <div class="stepper-item completed">
                                            <div class="step-counter"></div>
                                            <div class="step-name">At Depot</div>
                                        </div>
                                        <div class="stepper-item active">
                                            <div class="step-counter"></div>
                                            <div class="step-name">In Transit</div>
                                        </div>
                                        <div class="stepper-item">
                                            <div class="step-counter"></div>
                                            <div class="step-name">Out For Delivery</div>
                                        </div>
                                        <div class="stepper-item">
                                            <div class="step-counter"></div>
                                            <div class="step-name">Delivered</div>
                                        </div>
                                    </div>
                                    <!-- end :::  -->
                                    <!-- <ul class="order-proces-listing">
                                        <li class="active"><span>Received</span></span></li>
                                        <li class="active"><span>At Depot</span></li>
                                        <li class="active"><span class="last-point-active">In Transit</span></li>
                                        <li><span>Out For Delivery</span></li>
                                        <li><span>Delivered</span></li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- START: FIRST TAB CONTENT -->
                            <div id="first-pvs-posh" class="top-newOrder">
                                <h1 class=" border-b-txt">Pending Orders</h1>
                                <!-- start: TABLE -->
                                <table class="table" id="pvs-tab">
                                    <thead>
                                    <tr>
                                        <th class="shuffle-bx" scope="col" ><span class="sort-ad">Order Id <img class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Recipient <img class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Delivery Date <img class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        <th scope="col">Shipping Details</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr >
                                        <td>
                                            <img src="/img/nike-shoe1.png" alt="">
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>06/25/2021</span>
                                        </td>
                                        <td>
                                            <span>4949 Forest Ave, First FL Downers Grove, IL 60515</span>
                                        </td>
                                        <td>
                                            <span class="pendig-txt">Pending</span>
                                        </td>
                                        <td>
                                            <span class="track-btn">Track</span>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td>
                                            <img src="/img/nike-shoe1.png" alt="">
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>06/25/2021</span>
                                        </td>
                                        <td>
                                            <span>4949 Forest Ave, First FL Downers Grove, IL 60515</span>
                                        </td>
                                        <td>
                                            <span class="pendig-txt">Pending</span>
                                        </td>
                                        <td>
                                            <span class="track-btn">Track</span>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td>
                                            <img src="/img/nike-shoe1.png" alt="">
                                            <span>AKN 1250</span>
                                        </td>
                                        <td>
                                            <span>Stevan Kolman</span>
                                        </td>
                                        <td>
                                            <span>06/25/2021</span>
                                        </td>
                                        <td>
                                            <span>4949 Forest Ave, First FL Downers Grove, IL 60515</span>
                                        </td>
                                        <td>
                                            <span class="pendig-txt">Pending</span>
                                        </td>
                                        <td>
                                            <span class="track-btn">Track</span>
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
</template>

<script>
export default {

}
</script>
