<template>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <datepicker placeholder="From" class="datepicker hasDatepicker"></datepicker>
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <datepicker placeholder="To" class="datepicker hasDatepicker"></datepicker>
                    <i class="fa fa-calendar-check calendar"></i>
                </div>
            </div>
            <div class="col-sm-2">
                <select name="" id="">
                    <option value="">
                    </option>
                    <option value="" selected="">Current Year</option>

                </select>
            </div>
            <div class="col-sm-2 offset-sm-2">
                <button>CLEAR ALL</button>
            </div>
        </div>

        <div class="row">
            <h1>Analytics</h1>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_106.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Gross Sales</span>
                        <h2>$30,250</h2>
                    </div>
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
                        <h2>$1'500</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <h1 class="pd-0">Members</h1>
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_106.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Gross Sales</span>
                        <h2>$30,250</h2>
                    </div>
                    <div class="right">
                        <span>Total Gross Sales</span>
                        <h2>$30,250</h2>
                    </div>
                    <div class="right">
                        <span>Total Gross Sales</span>
                        <h2>$30,250</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">

                <h1 class="pd-0">Member Section</h1>
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_106.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Gross Sales</span>
                        <h2>$30,250</h2>
                    </div>
                    <div class="right">
                        <span>Total Gross Sales</span>
                        <h2>$30,250</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-6">
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
            <div class="col-sm-6">
                <h2>Sales By Categories</h2>
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

        <div class="row">
            <h1>Top Products</h1>
            <div class="col-sm-12">
                <div class="top-prodMain">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Seller Company</th>
                            <th scope="col">Vender Company</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <img src="/img/nike-shirt.png" alt="">
                                <span>Nike Shirt</span>
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

        <div class="row">
            <h1>
                New Orders
            </h1>
            <div class="col-sm-12">

                <div class="top-newOrder">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Order Id <img class="shuffle" src="/img/shuffle.png"></th>
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
import Navbar from './Navbar.vue';
import Sidebar from './Sidebar.vue';

export default {
    name: "dashboard",
    components: {
        datepicker,
        Navbar,
        Sidebar
    }
}
</script>
