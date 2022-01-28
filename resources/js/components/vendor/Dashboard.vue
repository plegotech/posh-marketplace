<template>

    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="box-shadow-wbg option-bx-p">
                    <div class="d-flex justify-content-between mobile-d-scroll">
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/total-sales-icons.png" width="134" height="80" alt=""></div>
                            <div class="secBox-rtxt">
                                <span>Vendor Orders</span>
                                <h3>3020</h3>
                            </div>
                        </div>
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/pending-orders.png" width="124" height="70" alt=""></div>
                            <div class="secBox-rtxt">
                                <span>Pending Orders</span>
                                <h3>30</h3>
                            </div>
                        </div>
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/cancel-icon.png" width="101" height="69" alt=""></div>
                            <div class="secBox-rtxt">
                                <span>Cancelled Orders</span>
                                <h3>10</h3>
                            </div>
                        </div>
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/ok-icon.png" width="101" height="69" alt=""></div>
                            <div class="secBox-rtxt">
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
                    <h2 class="title-b-inside">Earnings</h2>
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
                    <div class="recent_table-bxes">

                    <table class="table recent-Orders-table mobile-btn-show" id="vendor_DB">
                        <thead>
                        <tr>
                            <th scope="col"><span class="sort-ad">Order Id <img class="shuffle" src="/img/shuffle.png"></span></th>
                            <th scope="col"><span class="sort-ad">Product <img class="shuffle" src="/img/shuffle.png"></span></th>
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
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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
                                <span class="blue-txt">INV - 1002</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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
                                <span class="blue-txt">INV - 1003</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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
                                <span class="blue-txt">INV - 1004</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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
                                <span class="blue-txt">INV - 1005</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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
                                <span class="blue-txt">INV - 1006</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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

</template>
<script>
export default {
}
</script>
