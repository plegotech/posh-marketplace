<template>
    <div class="container-fluid pending-vend">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <div class="top-newOrder mb-4">

                    <div class="row mb-4 px-4">
                        <div class="col-sm-5">
                            <div class="search-box mt-3" style="max-width:100%">
                                <form action="">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input type="text" class="search_BX">
                                    <img src="/img/close-srch.png" class="close-icon" alt="">
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="row justify-content-end">
                                <div class="w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>Sort By</option>
                                        <option value="">Name</option>
                                        <option value="">Number</option>
                                    </select>
                                </div>
                                <div class="w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>Sub Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>All</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- START: FIRST TAB CONTENT -->
                            <div id="first-pvs-posh" class="top-newOrder">
                                <!-- start: TABLE -->
                                <table class="table" id="pvs-tab">
                                    <thead>
                                    <tr>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Order Id <img
                                            class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        </th>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Recipient <img
                                            class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Delivery Date <img
                                            class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
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
                                            <span class="comleted-txt">Shipped</span>
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
                                            <span class="cancelled-txt">Cancelled</span>
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
                                            <span class="comleted-txt">Shipped</span>
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
                                            <span class="cancelled-txt">Cancelled</span>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <div class="foot-table">
                                    <div class="left"><span>Rows Per Page:
                                            <select>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select>
                                            </span></div>
                                    <div class="right"><span>1-25 of 81 Items</span> <img src="/img/prev-arrow.png"
                                                                                          alt="" class="prev-itm"> <img
                                        src="/img/next-arrow.png" alt="" class="next-itm"></div>
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
export default {}
</script>
