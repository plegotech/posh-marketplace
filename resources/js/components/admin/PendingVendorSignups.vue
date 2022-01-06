<template>
    <div class="wrapper">
        <Sidebar/>
        <div class="body">
            <Navbar/>
            <div class="container-fluid pending-vend">

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <img :src="'/img/vendor-logos/'+ company.logo" style="max-width: 150px; height: auto"
                                 alt="">
                            <form ref="form">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" v-model="company.name" class="form-control"
                                           placeholder="Company Name">
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" v-model="company.first_name" class="form-control"
                                           placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" v-model="company.last_name" class="form-control"
                                           placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" v-model="company.email" class="form-control"
                                           placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" v-model="company.phone" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>Subscription Fee</label>
                                    <input type="number" v-model="company.subscription_fee" class="form-control"
                                           placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" v-model="company.address" class="form-control"
                                           placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" v-model="company.city" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" v-model="company.state" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" v-model="company.country" class="form-control"
                                           placeholder="Phone">
                                </div>
                                <button @click="addCompany()" class="btn btn-light btn-block">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

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
                                                <th scope="col" @click="fetchCompanies(0, 0, 'first_name')"><span class="sort-ad">First Name <img class="shuffle"
                                                                                                      src="/img/shuffle.png"></span>
                                                </th>
                                                <th scope="col" @click="fetchCompanies(0, 0, 'last_name')"><span class="sort-ad">Last Name <img class="shuffle"
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
                                                    <span>{{ company.phone }}</span>
                                                </td>
                                                <td>
                                                    <span>{{ company.name }}</span>
                                                </td>
                                                <td>
                                                    <span>{{ company.subscription_fee }}</span>
                                                </td>
                                                <td>
                                                    <span>Oct 01, 2021 09:58 PM</span>
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
                                                            <li @click="editCompany(company)" data-toggle="modal"
                                                                data-target=".bd-example-modal-lg">Edit
                                                            </li>
                                                            <li @click="markInactive(company.user_id)">Inactive</li>
                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="foot-table">
                                            <div class="left"><span>Rows Per Page:
                                            <select @change="fetchCompanies(current_page, $event.target.value)">
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select>
                                            </span></div>
                                            <div class="right">
                                                <span>{{ from }}-{{ to }} of {{ total }} Items</span>
                                                <img
                                                src="/img/prev-arrow.png" @click="fetchCompanies(current_page-1)"
                                                alt="" class="prev-itm">
                                                <img
                                                src="/img/next-arrow.png" @click="fetchCompanies(current_page+1)" alt="" class="next-itm"></div>
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
                                                <th scope="col"><span class="sort-ad">First Name <img class="shuffle"
                                                                                                      src="/img/shuffle.png"></span>
                                                </th>
                                                <th scope="col"><span class="sort-ad">Last Name <img class="shuffle"
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
    },
    data() {
        return {
            companies: [],
            per_page: 0,
            order: 'asc',
            order_by: 0,
            to: null,
            from: null,
            total: null,
            current_page: null,
            company: {
                id: '',
                user_id: '',
                first_name: '',
                last_name: '',
                phone: '',
                email: '',
                logo: '',
                name: '',
                subscription_fee: '',
                address: '',
                city: '',
                state: '',
                country: '',
            }
        }
    },
    mounted() {
        console.log('mounted')
    },
    created() {
        this.fetchCompanies();
    },
    methods: {
        fetchCompanies(page = 0, per_page = 0, order_by = 0) {
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
            }

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.companies = res.data;
                    this.to = res.to;
                    this.from = res.to - res.per_page;
                    this.total = res.total;
                    this.current_page = res.to / res.per_page;
                })
                .catch(err => console.log(err));
        },

        editCompany(company) {
            this.company.id = company.id;
            this.company.user_id = company.user_id;
            this.company.first_name = company.first_name;
            this.company.last_name = company.last_name;
            this.company.phone = company.phone;
            this.company.email = company.email;
            this.company.logo = company.logo;
            this.company.name = company.name;
            this.company.subscription_fee = company.subscription_fee;
            this.company.address = company.address;
            this.company.city = company.city;
            this.company.state = company.state;
            this.company.country = company.country;
        },

        exportCompanies() {
            window.open('/api/export-companies/vendor', '_blank').focus()
        },

        addCompany(company) {

            fetch('/api/company', {
                method: 'post',
                body: JSON.stringify(this.company),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == false) {
                        alert('the email is already taken or company name is empty');
                    } else {
                        this.clearForm();
                        this.fetchCompanies();
                    }
                })
                .catch(err => console.log(err));
        },

        markInactive(user_id) {
            var url = '/api/user/toggle-activation/' + user_id;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    this.fetchCompanies();
                })
                .catch(err => console.log(err));
        },

        clearForm() {
            this.company.id = "";
            this.company.first_name = "";
            this.company.last_name = "";
            this.company.phone = "";
            this.company.email = "";
            this.company.logo = "";
            this.company.name = "";
            this.company.subscription_fee = "";
            this.company.address = "";
            this.company.city = "";
            this.company.state = "";
            this.company.country = "";
            closeAllModals();
        }
    }
}
</script>
