<template>

    <div class="container-fluid pending-vend seller-vendor-prod">
        <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div class="top-newOrder">
<div class="row ">
                        <div class="col-sm-6 ">
                            <div class="search-box mb-4 flaot-left">
                                <img src="/img/search-icon.png" alt="" class="search-icon">
                                <input type="text" class="search_BX pendingVendorSearch"> <img src="/img/close-srch.png" alt="" class="close-icon">
                            </div>
                        </div>
                        <div class="col">
                        <div class="select-bx-sho mr-3">
                            <select name="" id="" class="select-custom-point min-150">
                                <option value="" selected="selected">Choose Year</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                        </div> 
                        </div>
                        <div class="col">
                        <div class="select-bx-sho">
                        <select name="" id="" class="select-custom-point min-150">
                            <option value="" selected="selected">Choose Month</option>
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
                    </div>
                    </div>

                            
                            <hr>
                            <br>
                            <div class="seller-tdiv">
                            <table class="table  recent-Orders-table mobile-btn-show">
                                <thead>
                                  <tr>
                                    <th scope="col"><span class="sort-ad">Order Id<img class="shuffle" src="/img/shuffle.png"></span></th>
                                    <th scope="col"><span class="sort-ad">Recipient<img class="shuffle" src="/img/shuffle.png"></span></th>
                                    <th scope="col"><span class="sort-ad">Delivery Date <img class="shuffle" src="/img/shuffle.png"></span></th>
                                    <th scope="col">Vendor Amount</th>
                                    <th scope="col">Seller Amount</th>
                                    <th scope="col">Profit Amount</th>
                                    <th scope="col">Payment Method</th>
                                  </tr>
                                </thead>
                                <tbody>

                                <tr v-for="order in orders">
                                    <td>
                                        <span>{{ order.id }}</span>
                                        <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                    </td>
                                    <td>

                                        <span>{{ order.first_name+" "+order.last_name }}</span>
                                    </td>
                                    <td>
                                        <span>03/26/2021</span>
                                    </td>
                                    <td>
                                        <span>${{ order.net_price }}</span>
                                    </td>
                                    <td>
                                        <span>${{ order.seller_price }}</span>
                                    </td>
                                    <td>
                                        <span>${{ order.seller_price-order.net_price }}</span>
                                    </td>
                                    <td>
                                        <span>Paypal</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
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
                        </div>

                    </div>
                </div>

    </div>

</template>


<script>
export default {
    data() {
        return {
            user: this.$store.state.auth.user,
            orders: [],
        }
    },
    created() {
        this.fetch();
    },
    methods: {
        async fetch(){
            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/orders/seller/' + this.user.id;
            axios.get(url)
                .then(res => {
                    this.orders = res.data.data;
                    console.log(this.orders)
                })
                .catch(err => console.log(err))
                .finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        }
    }
}
</script>
