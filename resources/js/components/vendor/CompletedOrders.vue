<template>
    <div class="container-fluid pending-vend comp-seller-myorders">
        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <!-- START: FIRST TAB CONTENT -->
                <div id="first-pvs-posh" class="top-newOrder">
                    <div class="row  ">
                        <div class="col-sm-6">
                            <div class="search-box mb-4">
                                <img src="/img/search-icon.png" class="search-icon" alt="">
                                <input style="float:left" type="text" class="search_BX"
                                       v-on:keypress="searchObjects"
                                       data-type="pending">
                                <img src="/img/close-srch.png" @click="removeSearch" class="close-icon"
                                     alt="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="justify-content-end row">
                                <div class="col-sm-auto col-6 mb-4">
                                    <select class="mt-0 select-custom-point">
                                        <option value="" selected>Choose Year</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                    </select>
                                </div>
                                <div class="col-sm-auto col-6 mb-4">
                                    <select class="mt-0 select-custom-point">
                                        <option value="" selected>Choose Month</option>
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
                    </div>
                    <div class="col">
                        <select class="mt-0 select-custom-point">
                            <option value="" selected>Choose Month</option>
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
        </div>
        <hr>
        <!-- start: TABLE -->
        <div class="row">
            <div class="col-sm-12">
                <div class="orders-completed-bx">
                    <table class="table span.td-title-bx" id="pvs-tab">
                        <thead>
                        <tr>
                            <th @click="fetch(0, 0, 'id')" class="shuffle-bx" scope="col"><span class="sort-ad">Order Id <img
                                class="shuffle"
                                src="/img/shuffle.png"></span>
                            </th>
                            <th @click="fetch(0, 0, 'name')" class="shuffle-bx" scope="col"><span class="sort-ad">Product <img
                                class="shuffle"
                                src="/img/shuffle.png"></span>
                            </th>
                            <th class="shuffle-bx" scope="col"><span class="sort-ad">Tracking Id <img
                                class="shuffle" src="/img/shuffle.png"></span>
                            </th>
                            <th @click="fetch(0, 0, 'ordered_at')" class="shuffle-bx" scope="col"><span class="sort-ad">Delivery Date <img
                                class="shuffle" src="/img/shuffle.png"></span>
                            </th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Pricing</th>
                            <th scope="col">Delivery Status</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Shipping Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="order in orders">
                            <td>
                                <span>{{ order.id }}</span>
                            </td>
                            <td>
                                <span>{{ order.name }}</span>
                            </td>
                            <td>
                                <span>MRP0043456</span>
                            </td>
                            <td>
                                <span>{{ order.ordered_at }}</span>
                            </td>
                            <td>
                                <span>{{ order.quantity }}</span>
                            </td>
                            <td>
                                <span>${{ order.quantity * order.net_price }}</span>
                            </td>
                            <td>
                                <span class="comleted-txt">{{ order.progress }}</span>
                            </td>
                            <td>
                                <span>Credit Card</span>
                            </td>
                            <td>
                                <span>{{ order.shipping_address }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="foot-table" v-if="total < 1">
            <p>No results found.</p>
        </div>
        <div class="foot-table" v-if="total > 0">
            <div class="left"><span>Rows Per Page:
                                            <select
                                                @change="fetch(current_page, $event.target.value)">
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select>
                                            </span></div>
            <div class="right">
                <span>{{ from }}-{{ to }} of {{ total }} Items</span>
                <img
                    src="/img/prev-arrow.png" @click="fetch(current_page-1)"
                    alt="" class="prev-itm">
                <img
                    src="/img/next-arrow.png" @click="fetch(current_page+1)"
                    alt="" class="next-itm"></div>
        </div>
        <!-- END: TABLE   -->
    </div>
    <!-- END::: FIRST TAB CONTENT -->
</template>

<script>

export default {
    data() {
        return {
            user: this.$store.state.auth.user,
            orders: [],
            search: 0,
            per_page: 0,
            order: 'asc',
            order_by: 0,
            to: null,
            from: null,
            total: null,
            current_page: null
        }
    },
    created() {
        this.fetch();
    },
    methods: {
        fetch(page = 0, per_page = 0, order_by = 0, search = 0) {
            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/orders/vendor/' + this.user.id;

            if (per_page > 0 || this.per_page > 0) {
                if (per_page > 0) {
                    this.per_page = per_page;
                }
                url += '/' + this.per_page;
            } else {
                url += '/25';
            }

            if (order_by != 0 || this.order_by > 0) {
                if (order_by != 0) {
                    this.order_by = order_by;
                    if (this.order == 'asc') {
                        this.order = 'desc';
                    } else {
                        this.order = 'asc';
                    }
                }
                url += '/' + this.order_by;
                url += '/' + this.order;
            } else {
                url += '/id';
                url += '/desc';
            }

            var search = search;

            if (search != 0 || this.search != 0) {
                if (search != 0) {
                    this.search = search;
                }
                url += '/' + this.search;
            } else {
                url += '/0';
            }

            url += '/delivered';

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.orders = res.data;
                    this.to = res.to;
                    this.from = res.from;
                    this.total = res.total;
                    if (res.total < res.per_page) {
                        this.from = 0;
                    }
                    this.current_page = res.to / res.per_page;
                })
                .catch(err => console.log(err))
                .finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },

        searchObjects: function (e) {
            if (e.keyCode === 13) {
                var element = e.target;
                this.fetch(0, 0, 0, element.value);
            }
        },

        removeSearch: function () {
            document.getElementsByClassName('search_BX')[0].value = '';
            this.search = 0;
            this.fetch();
        },
    }
}
</script>
