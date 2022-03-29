<template>
    <div class="container-fluid pending-vend">

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
            <div class="top-newOrder">
                <div class="tabs-section-bx">
                    <b-tabs content-class="mt-3">
                        <b-tab title="Pending Sellers" active>
                            <!-- START: FIRST TAB CONTENT -->
                            <div id="first-pvs-posh">
                                <div class="search-box mb-4">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input type="text" class="search_BX pendingSellerSearch" v-on:keypress="searchTheSellers"
                                           data-type="pending">
                                    <img src="/img/close-srch.png" @click="removePendingSellerSearch" class="close-icon" alt="">
                                </div>
                                <!-- start: TABLE -->
                                <div class="pendingvendor-sign">
                                <table class="table recent-Orders-table pss-bxb mobile-btn-show" id="pvs-tab">
                                    <thead>
                                    <tr>
                                        <th class="shuffle-bx" scope="col" @click="fetchCompanies(0, 0, 'first_name', 'pending')"><span class="sort-ad">First Name <img class="shuffle"
                                                                                                                                                                        src="/img/shuffle.png"></span>
                                        </th>
                                        <th class="shuffle-bx" scope="col" @click="fetchCompanies(0, 0, 'last_name', 'pending')"><span class="sort-ad">Last Name <img class="shuffle"
                                                                                                                                                                      src="/img/shuffle.png"></span>
                                        </th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City & State</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Signed-up Date & Time</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="company in companies" v-bind="company.id">
                                        <td>
                                            <span>{{ company.first_name }}</span>
                                            <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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
                                            <span>{{ company.user_phone }}</span>
                                        </td>
                                        <td>
                                            <span>{{ company.name }}</span>
                                        </td>
                                        <td>
                                            <span>{{ company.signup_date }}</span>
                                        </td>
                                        <td>
                                            <span>{{ company.email }}</span>
                                        </td>
                                        <td>


                                            <div class="dropdown cst-slct">
                                                <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                     data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <li @click="changeUserStatus(company.user_id, 'approved')" class="edit-mob">Accept</li>
                                                    <li @click="changeUserStatus(company.user_id, 'rejected')" class="inactive-mob">Reject</li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="foot-table" v-if="total < 1">
                                    <p>No results found.</p>
                                </div>
                                </div>
                                <div class="foot-table" v-if="total > 0">
                                    <div class="left"><span>Rows Per Page:
                                            <select @change="fetchCompanies(current_page, $event.target.value, 0, 'pending')">
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
                                            src="/img/next-arrow.png" @click="fetchCompanies(current_page+1, 0, 0, 'pending')" alt="" class="next-itm"></div>
                                </div>
                                <!-- END: TABLE   -->
                            </div>
                            <!-- END::: FIRST TAB CONTENT -->
                        </b-tab>
                        <b-tab title="Rejected Sellers">
                            <!-- START: FIRST TAB CONTENT -->
                            <div id="second-pvs-posh">
                                <div class="search-box mb-4">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input type="text" class="search_BX rejectedSellerSearch" v-on:keypress="searchTheSellers"
                                           data-type="rejected">
                                    <img src="/img/close-srch.png" @click="removeRejectedSellerSearch" class="close-icon" alt="">
                                </div>
                                <!-- start: TABLE -->
                                <div class="pendingvendor-sign">
                                <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                                    <thead>
                                    <tr>
                                        <th class="shuffle-bx" scope="col" @click="fetchCompanies(0, 0, 'first_name', 'rejected')"><span class="sort-ad">First Name <img class="shuffle"
                                                                                                                                                                         src="/img/shuffle.png"></span>
                                        </th>
                                        <th class="shuffle-bx" scope="col" @click="fetchCompanies(0, 0, 'last_name', 'rejected')"><span class="sort-ad">Last Name <img class="shuffle"
                                                                                                                                                                       src="/img/shuffle.png"></span>
                                        </th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City & State</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Signed-up Date & Time</th>
                                        <th scope="col">Email Address</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="company in rej_companies" v-bind="company.id">
                                        <td>
                                            <span>{{ company.first_name }}</span>
                                            <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
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
                                            <span>{{ company.user_phone }}</span>
                                        </td>
                                        <td>
                                            <span>{{ company.name }}</span>
                                        </td>
                                        <td>
                                            <span>{{ company.signup_date }}</span>
                                        </td>
                                        <td>
                                            <span>{{ company.email }}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="foot-table" v-if="rej_total < 1">
                                    <p>No results found.</p>
                                </div>
                                </div>
                                <div class="foot-table" v-if="rej_total > 0">
                                    <div class="left"><span>Rows Per Page:
                                            <select @change="fetchCompanies(rej_current_page, $event.target.value, 0, 'rejected')">
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select>
                                            </span></div>
                                    <div class="right">
                                        <span>{{ rej_from }}-{{ rej_to }} of {{ rej_total }} Items</span>
                                        <img
                                            src="/img/prev-arrow.png" @click="fetchCompanies(rej_current_page-1, 0, 0, 'rejected')"
                                            alt="" class="prev-itm">
                                        <img
                                            src="/img/next-arrow.png" @click="fetchCompanies(rej_current_page+1, 0, 0, 'rejected')" alt="" class="next-itm"></div>
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
            var url = '/api/companies/seller';

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

            if(type == 'pending') {
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
                    if(type == 'pending') {
                        this.companies = res.data;
                        this.to = res.to;
                        this.from = res.from;
                        this.total = res.total;
                        if(res.total < res.per_page) {
                            this.from = 0;
                        }
                        this.current_page = res.to / res.per_page;
                    } else {
                        this.rej_companies = res.data;
                        this.rej_to = res.to;
                        this.rej_from = res.from;
                        this.rej_total = res.total;
                        if(res.total < res.per_page) {
                            this.rej_from = 0;
                        }
                        this.rej_current_page = res.to / res.per_page;
                    }
                })
                .catch(err => console.log(err));
        },

        searchTheSellers: function (e) {
            if (e.keyCode === 13) {
                var element = e.target;
                var type = element.getAttribute('data-type');

                if (element.value.length) {
                    this.fetchCompanies(0, 0, 0, type, element.value)
                } else {
                    this.search = 0;
                    this.fetchCompanies(0, 0, 0, type)
                }
            }
        },

        removePendingSellerSearch: function () {
            document.getElementsByClassName('pendingSellerSearch')[0].value = '';
            this.search = 0;
            this.fetchCompanies(0, 0, 0, 'pending');
        },

        removeRejectedSellerSearch: function () {
            document.getElementsByClassName('rejectedSellerSearch')[0].value = '';
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
