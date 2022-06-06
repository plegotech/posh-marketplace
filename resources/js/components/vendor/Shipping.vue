<template>
    <div class="container-fluid pending-vend">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <div class="top-newOrder mb-4">
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-7">
                            <div class="search-box mb-4 float-right">
                                <img src="/img/search-icon.png" class="search-icon" alt="">
                                <input type="text" class="search_BX pendingVendorSearch">
                                <img src="/img/close-srch.png" class="close-icon" alt="">
                            </div>

                        </div>

                        <div class="col-sm-12">
                            <!-- START: FIRST TAB CONTENT -->
                            <div id="first-pvs-posh" class="">
                                <!-- start: TABLE -->
                                <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                                    <thead>
                                    <tr>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Order Id <img
                                            class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Delivery</span>
                                        </th>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Tracking No. <img
                                            class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        <th class="shuffle-bx" scope="col"><span class="sort-ad">Date <img
                                            class="shuffle" src="/img/shuffle.png"></span>
                                        </th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Zip</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="order in orders">
                                        <td>
                                            <span>{{ order.id }}</span>
                                            <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            <span>FEDEX</span>
                                        </td>
                                        <td>
                                            <span>{{ order.tracking_id }}</span>
                                        </td>
                                        <td>
                                            <span>{{ order.created_at }}</span>
                                        </td>
                                        <td>
                                            <span>{{ order.shipping_address }}</span>
                                        </td>
                                        <td>
                                            <span>USA</span>
                                        </td>
                                        <td>
                                            <span>{{ order.u_city }}</span>
                                        </td>
                                        <td>
                                            <span>{{ order.phone }}</span>
                                        </td>
                                        <td>
                                            <span>{{ order.u_zip }}</span>
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
            var url = '/api/orders/vendor/' + this.user.id;
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
