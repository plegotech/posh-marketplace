<template>
    <div class="container-fluid pending-vend comp-seller-myorders">
        <!--This is not dynamic, M copied com-panies code.-->
        <div class="row mt-4">
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div class="search-box mb-4">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input style="float:left" type="text" class="search_BX"
                                           v-on:keypress="searchObjects"
                                           data-type="pending">
                                    <img src="/img/close-srch.png" @click="removeSearch" class="close-icon"
                                         alt="">
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-12">
                                <DateFilter :year.sync="year" :month.sync="month" @fetch="fetch()"></DateFilter>                        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- start: TABLE -->
                                <div class="pendingOrder-bx">
                                    <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                                        <thead>
                                        <tr>
                                            <th class="shuffle-bx" scope="col"><span
                                                @click="fetch(0, 0, 'id')" class="sort-ad">Order Id <img
                                                class="shuffle"
                                                src="/img/shuffle.png"></span>
                                            </th>
                                            <th class="shuffle-bx" scope="col"><span
                                                @click="fetch(0, 0, 'first_name')"
                                                class="sort-ad">Recipient <img
                                                class="shuffle"
                                                src="/img/shuffle.png"></span>
                                            </th>
                                            <th class="shuffle-bx" scope="col"><span
                                                @click="fetch(0, 0, 'ordered_at')" class="sort-ad">Order Date <img
                                                class="shuffle"
                                                src="/img/shuffle.png"></span>
                                            </th>
                                            <th scope="col">Shipping Address</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="order in orders" v-bind="order.id">
                                            <td>
                                                <span>{{ order.id }}</span>
                                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                            </td>
                                            <td>
                                                <span>{{ order.first_name }} {{ order.last_name }}</span>
                                            </td>
                                            <td>
                                                <span>{{ order.ordered_at }}</span>
                                            </td>
                                            <td>
                                                <span>{{ order.shipping_address }}</span>
                                            </td>
                                            <td>
                                                <div class="dropdown cst-slct">
                                                <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                     data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <li @click="updateOrderStatus(order.id, 'approved')" class="edit-mob">Accept</li>
                                                    <li @click="updateOrderStatus(order.id, 'rejected')" class="inactive-mob">Reject</li>
                                                    <li class="inactive-mob">View</li>
                                                </ul>
                                            </div>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import DateFilter from '../DateFilter'

export default {
    components: {
        DateFilter
    },
    data() {
        return {
            orders:         [],
            date_range:     null,
            year:           '',
            month:          '',
            search:         0,
            per_page:       0,
            order:          'asc',
            order_by:       0,
            to:             null,
            from:           null,
            total:          null,
            current_page:   null,
            user:           this.$store.state.auth.user,
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

            url += '/pending';

            this.date_range = '';

            if (this.year && this.year != 'null') {
                this.date_range = this.year;
            }

            if (this.month && this.month != 'null') {
                this.date_range += '-' + this.month + '-';
            }

            if (this.date_range) {
                url += '/' + this.date_range;
            }

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
                var type = element.getAttribute('data-type');
                this.fetch(0, 0, 0, element.value);
            }
        },

        removeSearch: function () {
            document.getElementsByClassName('search_BX')[0].value = '';
            this.search = 0;
            this.fetch();
        },

        updateOrderStatus(id, status) {
            document.getElementById('ajaxLoader').style.display = 'block';
            var object = this;
            var url = '/api/orders/vendor-change-status/' + this.user.id + '/' + id + '/' + status;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    alert(data);
                })
                .catch(err => console.log(err))
                .finally(function () {
                    object.fetch();
                    document.getElementById('ajaxLoader').style.display = 'none';
                });;
        }
    }
}
</script>
