<template>

    <div class="container-fluid pending-vend seller-vendor-prod">

        <div class="row" style="margin-top:20px">

            <div class="col-sm-12">

                <div class="top-newOrder payment_Hist">

                    <div class="row">
                        <div class="col-sm-3">
                            <select>
                                <option value="" selected>Electronic Accessories</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="" id="">
                                <option value="" selected>Airpods</option>
                                <option value="Janruary">Janruary</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="search-box mb-4 col-sm-3 offset-sm-3">
                            <img src="/img/search-icon.png" class="search-icon" alt="">
                            <input style="float:left" type="text" class="search_BX pendingVendorSearch"
                                   v-on:keypress="searchTheVendors"
                                   data-type="pending">
                            <img src="/img/close-srch.png" @click="removePendingVendorSearch" class="close-icon" alt="">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="mini-head">Results</p>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col" style="width:40%" class="center"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                </td>
                                <td>
                                    <span>Apple Airpod Second Generation</span>
                                </td>
                                <td>
                                    <span>
                                        $249.00
                                    </span>
                                </td>
                                <td class="center">                             
                                    <label class="chk-td-cont">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                                <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                </td>
                                <td>
                                    <span>Apple Airpod Second Generation</span>
                                </td>
                                <td>
                                    <span>
                                        $249.00
                                    </span>
                                </td>
                                <td class="center">                             
                                    <label class="chk-td-cont">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                                <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                </td>
                                <td>
                                    <span>Apple Airpod Second Generation</span>
                                </td>
                                <td>
                                    <span>
                                        $249.00
                                    </span>
                                </td>
                                <td class="center">                             
                                    <label class="chk-td-cont">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="foot-table">
                        <div class="left">
                                    <span>Rows Per Page:
                                        <select>
                                            <option value="4" selected>4</option>
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

                    
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col" style="width:40%" class="center"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                </td>
                                <td>
                                    <span>Apple Airpod Second Generation</span>
                                </td>
                                <td>
                                    <span>
                                        $249.00
                                    </span>
                                </td>
                                <td class="center">                             
                                    <label class="chk-td-cont">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                                <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                </td>
                                <td>
                                    <span>Apple Airpod Second Generation</span>
                                </td>
                                <td>
                                    <span>
                                        $249.00
                                    </span>
                                </td>
                                <td class="center">                             
                                    <label class="chk-td-cont">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                                <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                </td>
                                <td>
                                    <span>Apple Airpod Second Generation</span>
                                </td>
                                <td>
                                    <span>
                                        $249.00
                                    </span>
                                </td>
                                <td class="center">                             
                                    <label class="chk-td-cont">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
