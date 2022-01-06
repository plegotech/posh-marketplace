<template>
    <div class="wrapper">
        <Sidebar/>
        <div class="body">
            <Navbar/>
            <div class="container-fluid pending-vend">

                <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div>
                            <b-tabs content-class="mt-3">
                                <b-tab title="Pending Vendors" active>
                                    <!-- START: FIRST TAB CONTENT -->
                                    <div id="first-pvs-posh" class="top-newOrder">
                                        <div class="search-box mb-4">
                                            <form action="">
                                                <img src="/img/search-icon.png" class="search-icon" alt="">
                                                <input type="text" class="search_BX">
                                                <img src="/img/close-srch.png" class="close-icon" alt="">
                                            </form>
                                        </div>
                                        <!-- start: TABLE -->
                                        <table class="table" id="pvs-tab">
                                            <thead>
                                            <tr>
                                                <th class="shuffle-bx" scope="col"><span class="sort-ad">First Name <img class="shuffle"
                                                                                                      src="/img/shuffle.png"></span>
                                                </th>
                                                <th class="shuffle-bx" scope="col"><span class="sort-ad">Last Name <img class="shuffle"
                                                                                                     src="/img/shuffle.png"></span>
                                                </th>
                                                <th scope="col">Address</th>
                                                <th scope="col">City & State</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Company</th>
                                                <th scope="col">Subscription Fees</th>
                                                <th scope="col">Signed-up Date & Time</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>4949, Forecast Ave</span>
                                                </td>
                                                <td>
                                                    <span>Chicago, Illinois</span>
                                                </td>
                                                <td>
                                                    <span>630-3542-2342</span>
                                                </td>
                                                <td>
                                                    <span>DELL</span>
                                                </td>
                                                <td>
                                                    <span>$100</span>
                                                </td>
                                                <td>
                                              <span>Oct 01, 2021
                                                09:58 PM</span>
                                                </td>
                                                <td>
                                                    <span>ricky@yahoo.com habib</span>
                                                </td>
                                                <td>


                                                    <div class="dropdown cst-slct">
                                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                             data-toggle="dropdown" aria-haspopup="true"
                                                             aria-expanded="false">
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <li>Edit</li>
                                                            <li>Inactive</li>
                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>4949, Forecast Ave</span>
                                                </td>
                                                <td>
                                                    <span>Chicago, Illinois</span>
                                                </td>
                                                <td>
                                                    <span>630-3542-2342</span>
                                                </td>
                                                <td>
                                                    <span>DELL</span>
                                                </td>
                                                <td>
                                                    <span>$100</span>
                                                </td>
                                                <td>
                                              <span>Oct 01, 2021
                                                09:58 PM</span>
                                                </td>
                                                <td>
                                                    <span>ricky@yahoo.com</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown cst-slct">
                                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                             data-toggle="dropdown" aria-haspopup="true"
                                                             aria-expanded="false">
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <li>Edit</li>
                                                            <li>Inactive</li>
                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="foot-table">
                                            <div class="left"><span>Rows Per Page:
                                            <select><option value="4" selected="selected">4</option> <option
                                                value="3">3</option> <option value="2">2</option> <option
                                                value="1">1</option></select></span></div>
                                            <div class="right"><span>1-4 of 20 Items</span> <img
                                                src="/img/prev-arrow.png"
                                                alt="" class="prev-itm"> <img
                                                src="/img/next-arrow.png" alt="" class="next-itm"></div>
                                        </div>

                                        <!-- END: TABLE   -->
                                    </div>
                                    <!-- END::: FIRST TAB CONTENT -->
                                </b-tab>
                                <b-tab title="Rejected Vendors">
                                    <!-- START: FIRST TAB CONTENT -->
                                    <div id="second-pvs-posh" class="top-newOrder">
                                        <div class="search-box mb-4">
                                            <form action="">
                                                <img src="/img/search-icon.png" class="search-icon" alt="">
                                                <input type="text" class="search_BX">
                                                <img src="/img/close-srch.png" class="close-icon" alt="">
                                            </form>
                                        </div>
                                        <!-- start: TABLE -->
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="shuffle-bx" scope="col"><span class="sort-ad">First Name <img class="shuffle"
                                                                                                      src="/img/shuffle.png"></span>
                                                </th>
                                                <th class="shuffle-bx" scope="col"><span class="sort-ad">Last Name <img class="shuffle"
                                                                                                     src="/img/shuffle.png"></span>
                                                </th>
                                                <th scope="col">Address</th>
                                                <th scope="col">City & State</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Company</th>
                                                <th scope="col">Subscription Fees</th>
                                                <th scope="col">Signed-up Date & Time</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>4949, Forecast Ave</span>
                                                </td>
                                                <td>
                                                    <span>Chicago, Illinois</span>
                                                </td>
                                                <td>
                                                    <span>630-3542-2342</span>
                                                </td>
                                                <td>
                                                    <span>DELL</span>
                                                </td>
                                                <td>
                                                    <span>$100</span>
                                                </td>
                                                <td>
                                              <span>Oct 01, 2021
                                                09:58 PM</span>
                                                </td>
                                                <td>
                                                    <span>ricky@yahoo.com</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown cst-slct">
                                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                             data-toggle="dropdown" aria-haspopup="true"
                                                             aria-expanded="false">
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <li>Edit</li>
                                                            <li>Inactive</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>Ricky</span>
                                                </td>
                                                <td>
                                                    <span>4949, Forecast Ave</span>
                                                </td>
                                                <td>
                                                    <span>Chicago, Illinois</span>
                                                </td>
                                                <td>
                                                    <span>630-3542-2342</span>
                                                </td>
                                                <td>
                                                    <span>DELL</span>
                                                </td>
                                                <td>
                                                    <span>$100</span>
                                                </td>
                                                <td>
                                              <span>Oct 01, 2021
                                                09:58 PM</span>
                                                </td>
                                                <td>
                                                    <span>ricky@yahoo.com</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown cst-slct">
                                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                             data-toggle="dropdown" aria-haspopup="true"
                                                             aria-expanded="false">
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <li>Edit</li>
                                                            <li>Inactive</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="foot-table">
                                            <div class="left"><span>Rows Per Page:
                                            <select><option value="4" selected="selected">4</option> <option
                                                value="3">3</option> <option value="2">2</option> <option
                                                value="1">1</option></select></span></div>
                                            <div class="right"><span>1-4 of 20 Items</span> <img
                                                src="/img/prev-arrow.png"
                                                alt="" class="prev-itm"> <img
                                                src="/img/next-arrow.png" alt="" class="next-itm"></div>
                                        </div>

                                        <!-- END: TABLE   -->
                                    </div>
                                    <!-- END::: FIRST TAB CONTENT -->
                                </b-tab>
                            </b-tabs>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from './Navbar.vue';
import Sidebar from './Sidebar.vue';

export default {
    components: {
        Navbar,
        Sidebar
    }
}
</script>
