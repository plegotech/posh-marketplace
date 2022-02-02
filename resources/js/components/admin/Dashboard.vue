<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <datepicker :clear-button="true" v-model="first_date" :value="first_date" @closed="basicStatistics()" placeholder="From" class="datepicker hasDatepicker"></datepicker>
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <datepicker :clear-button="true" v-model="last_date" :value="last_date" @closed="basicStatistics()" placeholder="To" class="datepicker hasDatepicker"></datepicker>
                    <i class="fa fa-calendar-check calendar"></i>
                </div>
            </div>
            <div class="col-sm-2">
                <select @change="basicStatistics($event.target.value)" class="mtc-24">
                    <option value="0" selected>Select time period</option>
                    <option value="year">Current Year</option>
                    <option value="quarter">Current Quarter</option>
                    <option value="month">Current Month</option>
                </select>
            </div>
            <div class=" col-sm-4">
                <button @click="clearFiltration()" class="mtc-24 secondary float-right  mt-4">CLEAR ALL</button>
            </div>
        </div>
        <br>
        <div class="row">
            <h1>Analytics</h1>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_106.png" alt="">
                    </div>
                    <div class="right"><span>Total Gross Sales</span>
                        <h2>${{ gross_sales }}</h2></div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_136.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Net Sales</span>
                        <h2>$25,980</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_107.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Orders</span>
                        <h2>{{ total_orders }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-7">
                <h1 class="pd-0">Members</h1>
                <div class="box">
                    <div class="left">
                        <img src="/img/members-icon.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Vendors</span>
                        <h2>{{ total_vendors }}</h2>
                    </div>
                    <div class="right">
                        <span>Total Sellers</span>
                        <h2>{{ total_sellers }}</h2>
                    </div>
                    <div class="right">
                        <span>Total Users</span>
                        <h2>{{ total_users }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <h1 class="pd-0">Member Section</h1>
                <div class="box">
                    <div class="right">
                        <span>Vendor Sign Up Requests</span>
                        <h2>{{ vendor_request }}</h2>
                    </div>
                    <div class="right">
                        <span>Seller Sign Up Requests</span>
                        <h2>{{ seller_request }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">

            <div class="col-sm-6 mt-5">
                <h2>Sales By Categories</h2>
                <div>
                    <b-tabs content-class="mt-3">
                        <b-tab title="Current Year" active>
                            <!-- START:: CURRENT YEAR CONTENT -->
                            <table>
                                <tbody>
                                <tr>
                                    <td>Phoenix Entertainment NYC</td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>Wildly Different</td>
                                    <td>$432,600</td>
                                </tr>
                                <tr>
                                    <td>Tastling NYC | SoFlo</td>
                                    <td>$235,450</td>
                                </tr>
                                <tr>
                                    <td>Kindle Store</td>
                                    <td>$333,460</td>
                                </tr>
                                <tr>
                                    <td>Williamson</td>
                                    <td>$1,234</td>
                                </tr>
                                <tr>
                                    <td>Extreme Commerce</td>
                                    <td>$33,350</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END  :: CURRENT YEAR CONTENT -->
                        </b-tab>
                        <b-tab title="Current Month">
                            <!-- START:: CURRENT MONTH CONTENT -->
                            <table>
                                <tbody>
                                <tr>
                                    <td>Computers</td>
                                    <td>$1,000,000</td>
                                </tr>
                                <tr>
                                    <td>Beauty &amp; Personal Care</td>
                                    <td>$545,600</td>
                                </tr>
                                <tr>
                                    <td>Digital Music</td>
                                    <td>$235,600</td>
                                </tr>
                                <tr>
                                    <td>Kindle Store</td>
                                    <td>$33,460</td>
                                </tr>
                                <tr>
                                    <td>Electronics</td>
                                    <td>$103,250</td>
                                </tr>
                                <tr>
                                    <td>Home &amp; Kitchen</td>
                                    <td>$23,350</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END::   CURRENT MONTH CONTENT -->
                        </b-tab>
                        <b-tab title="Current Quarter">
                            <!-- START:: CURRENT QUARTER CONTETN -->
                            <table>
                                <tbody>
                                <tr>
                                    <td>Architecture</td>
                                    <td>$1,000,000</td>
                                </tr>
                                <tr>
                                    <td>Personal Care</td>
                                    <td>$545,600</td>
                                </tr>
                                <tr>
                                    <td>Digital</td>
                                    <td>$235,600</td>
                                </tr>
                                <tr>
                                    <td>Kindle Store and other</td>
                                    <td>$33,460</td>
                                </tr>
                                <tr>
                                    <td>Electronics</td>
                                    <td>$103,250</td>
                                </tr>
                                <tr>
                                    <td>Home &amp; Kitchen</td>
                                    <td>$23,350</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END ::: CURRENT QUARTER CONTENT -->
                        </b-tab>
                    </b-tabs>
                </div>

            </div>
            <div class="col-sm-6 mt-5">
                <h2>Top 10 Sellers</h2>
                <div>
                    <b-tabs content-class="mt-3">
                        <b-tab title="Current Year" active>
                            <!-- START:: CURRENT YEAR CONTENT -->
                            <table>
                                <tbody>
                                <tr>
                                    <td>Computers</td>
                                    <td>$1,000,000</td>
                                </tr>
                                <tr>
                                    <td>Beauty &amp; Personal Care</td>
                                    <td>$545,600</td>
                                </tr>
                                <tr>
                                    <td>Digital Music</td>
                                    <td>$235,600</td>
                                </tr>
                                <tr>
                                    <td>Kindle Store</td>
                                    <td>$33,460</td>
                                </tr>
                                <tr>
                                    <td>Electronics</td>
                                    <td>$103,250</td>
                                </tr>
                                <tr>
                                    <td>Home &amp; Kitchen</td>
                                    <td>$23,350</td>
                                </tr>
                                </tbody>

                            </table>
                            <!-- END  :: CURRENT YEAR CONTENT -->
                        </b-tab>
                        <b-tab title="Current Month">
                            <!-- START:: CURRENT MONTH CONTENT -->
                            <table>
                                <tbody>
                                <tr>
                                    <td>Phoenix Entertainment NYC</td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>Wildly Different</td>
                                    <td>$432,600</td>
                                </tr>
                                <tr>
                                    <td>Tastling NYC | SoFlo</td>
                                    <td>$235,450</td>
                                </tr>
                                <tr>
                                    <td>Kindle Store</td>
                                    <td>$333,460</td>
                                </tr>
                                <tr>
                                    <td>Williamson</td>
                                    <td>$1,234</td>
                                </tr>
                                <tr>
                                    <td>Extreme Commerce</td>
                                    <td>$33,350</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END::   CURRENT MONTH CONTENT -->
                        </b-tab>
                        <b-tab title="Current Quarter">
                            <!-- START:: CURRENT QUARTER CONTETN -->
                            <table>
                                <tbody>
                                <tr>
                                    <td>Architecture</td>
                                    <td>$1,000,000</td>
                                </tr>
                                <tr>
                                    <td>Personal Care</td>
                                    <td>$545,600</td>
                                </tr>
                                <tr>
                                    <td>Digital</td>
                                    <td>$235,600</td>
                                </tr>
                                <tr>
                                    <td>Kindle Store and other</td>
                                    <td>$33,460</td>
                                </tr>
                                <tr>
                                    <td>Electronics</td>
                                    <td>$103,250</td>
                                </tr>
                                <tr>
                                    <td>Home &amp; Kitchen</td>
                                    <td>$23,350</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END ::: CURRENT QUARTER CONTENT -->
                        </b-tab>
                    </b-tabs>
                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <h1>Top Products</h1>
            <div class="col-sm-12">
                <div class="top-prodMain">
                    <table class="table recent-Orders-table mobile-btn-show" id="dashboardTop_Admin">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Seller Company</th>
                            <th scope="col">Vendor Company</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <img src="/img/nike-shirt.png" alt="">
                                <span>Nike Shirt</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>Fath Textile</span>
                            </td>
                            <td>
                                <span>WIldly Different</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="/img/cotton-shirt.png" alt="">
                                <span>Cotton Shirt</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>Fath Textile</span>
                            </td>
                            <td>
                                <span>WIldly Different</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="/img/nike-shoes.png" alt="">
                                <span>Nike Shoes</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>Fath Textile</span>
                            </td>
                            <td>
                                <span>WIldly Different</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <h1>
                New Orders
            </h1>
            <div class="col-sm-12">

                <div class="top-newOrder">

                    <table class="table recent-Orders-table mobile-btn-show" id="newOrder_Admin">
                        <thead>
                        <tr>
                            <th scope="col"><span class="sort-ad">Order Id <img class="shuffle" src="/img/shuffle.png"></span>
                            </th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Seller Name</th>
                            <th scope="col">Vendor Company</th>
                            <th scope="col">Date of Purchase</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Paid</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <img src="/img/akn-1250.png" alt="">
                                <span>AKN 1250</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>Dell</span>
                            </td>
                            <td>
                                <span>Wildly Different</span>
                            </td>
                            <td>
                                <span>Dmvit Group</span>
                            </td>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>240</span>
                            </td>
                            <td>
                                <span>$356,346</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="/img/akn-1250-1.png" alt="">
                                <span>AKN 1250</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>Dell</span>
                            </td>
                            <td>
                                <span>Wildly Different</span>
                            </td>
                            <td>
                                <span>Dmvit Group</span>
                            </td>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>46</span>
                            </td>
                            <td>
                                <span>$33,525</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="/img/akn-1250-2.png" alt="">
                                <span>AKN 1250</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>Dell</span>
                            </td>
                            <td>
                                <span>Wildly Different</span>
                            </td>
                            <td>
                                <span>Dmvit Group</span>
                            </td>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>240</span>
                            </td>
                            <td>
                                <span>$356,34</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="/img/akn-1250-3.png" alt="">
                                <span>AKN 1250</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>Dell</span>
                            </td>
                            <td>
                                <span>Wildly Different</span>
                            </td>
                            <td>
                                <span>Dmvit Group</span>
                            </td>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>240</span>
                            </td>
                            <td>
                                <span>$356,346</span>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="foot-table">
                        <div class="left">
                                        <span>Rows Per Page:
                                            <select>
                                                <option value="4" selected="">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </span>
                        </div>
                        <div class="right">
                            <span>1-4 of 20 Items</span>
                            <img src="/img/prev-arrow.png" class="prev-itm" alt="">
                            <img src="/img/next-arrow.png" class="next-itm" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import datepicker from 'vuejs-datepicker';

export default {
    name: "dashboard",
    data() {
        return {
            time_period:        0,
            gross_sales:        null,
            total_orders:       null,
            vendor_request:     null,
            seller_request:     null,
            total_vendors:      null,
            first_date:         0,
            last_date:          0,
            total_sellers:      null,
            total_users:        null
        }
    },
    components: {
        datepicker
    },
    created() {
        this.basicStatistics();
    },
    methods: {
        clearFiltration() {
            this.first_date     = 0;
            this.last_date      = 0;
            this.time_period    = 0;
            this.basicStatistics(0);
        },
        basicStatistics(time_period = 0) {

            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/admin/basic-statistics';

            var time_period = time_period;

            if (time_period != 0 || this.time_period != 0) {
                if (time_period != 0) {
                    this.time_period    = time_period;
                    this.first_date     = 0;
                    this.last_date      = 0;
                }
                url += '/' + this.time_period;
            } else {
                url += '/0';
            }

            if (this.first_date != 0 && this.time_period == 0) {
                url += '/' + this.first_date;
            } else {
                url += '/0';
            }

            if (this.last_date != 0 && this.time_period == 0) {
                url += '/' + this.last_date;
            } else {
                url += '/0';
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.total_orders       = res.total_orders;
                    this.vendor_request     = res.vendor_request;
                    this.vendor_request     = res.vendor_request;
                    this.seller_request     = res.seller_request;
                    this.total_vendors      = res.total_vendors;
                    this.total_sellers      = res.total_sellers;
                    this.total_users        = res.total_users;
                    this.gross_sales        = res.gross_sales;
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        salesByCategory() {

        },
        topTenSellers() {

        },
        topProducts() {

        },
        newOrders() {

        }
    }
}
</script>
