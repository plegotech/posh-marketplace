<template>
    <div class="container-fluid pending-vend comp-seller-myorders">
<!--This is not dynamic, M copied companies code.-->
        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        <div class="search-box mb-4">
                            <img src="/img/search-icon.png" class="search-icon" alt="">
                            <input style="float:left" type="text" class="search_BX pendingVendorSearch"
                                   v-on:keypress="searchTheVendors"
                                   data-type="pending">
                            <img src="/img/close-srch.png" @click="removePendingVendorSearch" class="close-icon" alt="">
                        </div>
                        <hr>
                        <!-- start: TABLE -->
                        <table class="table" id="pvs-tab">
                            <thead>
                            <tr>
                                <th class="shuffle-bx" scope="col" @click=""><span class="sort-ad">Order Id <img
                                    class="shuffle"
                                    src="/img/shuffle.png"></span>
                                </th>
                                <th class="shuffle-bx" scope="col" @click=""><span class="sort-ad">Recipient <img
                                    class="shuffle"
                                    src="/img/shuffle.png"></span>
                                </th>
                                <th class="shuffle-bx" scope="col" @click=""><span class="sort-ad">Delivery Date <img
                                    class="shuffle"
                                    src="/img/shuffle.png"></span>
                                </th>
                                <th scope="col">Shipping Details</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="company in companies" v-bind="company.id">
                                <td>
                                    <span>{{ company.first_name }}</span>
                                </td>
                                <td>
                                    <span>{{ company.last_name }}</span>
                                </td>
                                <td>
                                    <span>{{ company.address }}</span>
                                </td>
                                <td>
                                    <span>{{ company.city }}, {{ company.state }}</span>
                                </td>
                                <td>
                                    <span><span class="shipped">Shipped</span></span>
                                    <!--<span><span class="cancelled">Cancelled</span></span>
                                    <span><span class="pending">Pending</span></span>-->
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="foot-table" v-if="total < 1">
                            <p>No results found.</p>
                        </div>
                        <div class="foot-table" v-if="total > 0">
                            <div class="left"><span>Rows Per Page:
                                            <select
                                                @change="fetchCompanies(current_page, $event.target.value, 0, 'pending')">
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select>
                                            </span></div>
                            <div class="right">
                                <span>{{ from }}-{{ to }} of {{ total }} Items</span>
                                <img
                                    src="/img/prev-arrow.png" @click="fetchCompanies(current_page-1, 0, 0, 'pending')"
                                    alt="" class="prev-itm">
                                <img
                                    src="/img/next-arrow.png" @click="fetchCompanies(current_page+1, 0, 0, 'pending')"
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

export default {
    data() {
        return {
            companies: [],
            rej_companies: [],
            search: 0,
            per_page: 0,
            order: 'asc',
            order_by: 0,
            to: null,
            from: null,
            total: null,
            current_page: null,
            rej_to: null,
            rej_from: null,
            rej_total: null,
            rej_current_page: null
        }
    },
    created() {
        this.fetchCompanies();
        this.fetchCompanies(0, 0, 0, 'pending');
    },
    methods: {
        fetchCompanies(page = 0, per_page = 0, order_by = 0, type = 'rejected', search = 0) {
            var url = '/api/companies/vendor';

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

            if (type == 'pending') {
                url += '/pending';
            } else {
                url += '/rejected';
            }

            var search = search;

            if (search != 0 || this.search != 0) {
                if (search != 0) {
                    this.search = search;
                }
                url += '/' + this.search;
            }

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    if (type == 'pending') {
                        this.companies = res.data;
                        this.to = res.to;
                        this.from = res.per_page - res.to;
                        this.total = res.total;
                        if (res.total < res.per_page) {
                            this.from = 0;
                        }
                        this.current_page = res.to / res.per_page;
                    } else {
                        this.rej_companies = res.data;
                        this.rej_to = res.to;
                        this.rej_from = res.per_page - res.to;
                        this.rej_total = res.total;
                        if (res.total < res.per_page) {
                            this.rej_from = 0;
                        }
                        this.rej_current_page = res.to / res.per_page;
                    }
                })
                .catch(err => console.log(err));
        },

        searchTheVendors: function (e) {
            if (e.keyCode === 13) {
                var element = e.target;
                var type = element.getAttribute('data-type');

                if (type == 'pending') {
                    this.fetchCompanies(0, 0, 0, 'pending', element.value);
                } else {
                    this.fetchCompanies(0, 0, 0, 'rejected', element.value);
                }
            }
        },

        removePendingVendorSearch: function () {
            document.getElementsByClassName('pendingVendorSearch')[0].value = '';
            this.search = 0;
            this.fetchCompanies(0, 0, 0, 'pending');
        },

        removeRejectedVendorSearch: function () {
            document.getElementsByClassName('rejectedVendorSearch')[0].value = '';
            this.search = 0;
            this.fetchCompanies(0, 0, 0, 'rejected');
        },

        changeUserStatus(user_id, status) {
            var url = '/api/user/change-status/' + user_id + '/' + status;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    this.fetchCompanies();
                    this.fetchCompanies(0, 0, 0, 'pending');
                })
                .catch(err => console.log(err));
        }
    }
}
</script>
