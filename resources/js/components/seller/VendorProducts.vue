<template>

    <div class="container-fluid pending-vend seller-vendor-prod">

        <div class="row mt-4" >

            <div class="col-sm-12">

                <div class="top-newOrder payment_Hist">

                    <div class="row">
                        <div class="col-sm-3 mb-4">
                            <select class="select-custom-point">
                                <option value="" selected>Electronic Accessories</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                        <div class="col-sm-3 mb-4">
                            <select name="" id="" class="select-custom-point">
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
                    <table class="table vendorProduct">
                        <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="center"></th>
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
                    

                    
                    <div class="my-product">
                        <h2>My Products <span>(3 of 20 chosen)</span></h2>
                    </div>
                    <table class="table vendorProduct">
                        <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="center"></th>
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
