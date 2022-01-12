<template>
    <div class="container-fluid pending-vend">

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form ref="form">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" v-model="user.first_name" class="form-control"
                                   placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" v-model="user.last_name" class="form-control"
                                   placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" v-model="user.email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" v-model="user.phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <select class="form-control" v-model="user.user_type">
                                <option value="user">User</option>
                                <option value="seller">Seller</option>
                                <option value="vendor">Vendor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" v-model="user.status">
                                <option value="approved">Approved</option>
                                <option value="pending">Pending</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <button @click="addUser()" class="btn btn-light btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">

                <div class="top-newOrder">

                    <div class="pending-vend">
                        <div class="search-box mb-4">
                            <img src="/img/search-icon.png" class="search-icon" alt="">
                            <input type="text" class="search_BX fetchUsersSearch" v-on:keypress="fetchUsersSearch">
                            <img src="/img/close-srch.png" @click="fetchUsersSearchClear" class="close-icon" alt="">
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="shuffle-bx" scope="col" @click="fetchUsers(0, 0, 'first_name')">First Name <img
                                class="shuffle" src="/img/shuffle.png"></th>
                            <th class="shuffle-bx" scope="col" @click="fetchUsers(0, 0, 'last_name')">Last Name <img
                                class="shuffle" src="/img/shuffle.png"></th>
                            <th class="shuffle-bx" scope="col" @click="fetchUsers(0, 0, 'email')">Email Address <img
                                class="shuffle" src="/img/shuffle.png"></th>
                            <th scope="col">Phone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in users" v-bind:key="user.id">
                            <td>
                                <span>{{ user.first_name }}</span>
                            </td>
                            <td>
                                <span>{{ user.last_name }}</span>
                            </td>
                            <td>
                                <span><span>{{ user.email }}</span></span>
                            </td>
                            <td>
                                <span><span>{{ user.phone }}</span></span>
                            </td>
                            <td>
                                <span><span style="text-transform: uppercase">{{ user.status }}</span></span>
                            </td>
                            <td>
                                <button class="cst-slct">
                                    <img src="/img/more.png" class="more-opt" alt="">
                                    <ul class="more-opts">
                                        <li @click="editUser(user)" data-toggle="modal"
                                            data-target=".bd-example-modal-lg">Edit
                                        </li>
                                        <li @click="markInactive(user.id)">Inactive</li>
                                    </ul>
                                </button>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="foot-table">
                        <div class="left">
                                    <span>Rows Per Page:
                                        <select @change="fetchUsers(current_page, $event.target.value)">
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                    </span>
                        </div>
                        <div class="right">
                            <span>{{ from }}-{{ to }} of {{ total }} Items</span>
                            <img src="/img/prev-arrow.png" @click="fetchUsers(current_page-1)" class="prev-itm"
                                 alt="">
                            <img src="/img/next-arrow.png" @click="fetchUsers(current_page+1)" class="next-itm"
                                 alt="">
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
            users: [],
            search: 0,
            per_page: 0,
            order: 'asc',
            order_by: 0,
            to: null,
            from: null,
            total: null,
            current_page: null,
            user: {
                id: '',
                first_name: '',
                last_name: '',
                phone: '',
                email: '',
                user_type: '',
                status: '',
            }
        }
    },
    mounted() {
        console.log('mounted')
    },
    created() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers(page = 0, per_page = 0, order_by = 0, search = 0) {
            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/users/user';

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

            url += '/approved';

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
                    this.users = res.data;
                    this.to = res.to;
                    this.from = res.from;
                    this.total = res.total;
                    this.current_page = res.to / res.per_page;
                    document.getElementById('ajaxLoader').style.display = 'none';
                })
                .catch(err => console.log(err));
        },

        fetchUsersSearchClear: function () {
            document.getElementsByClassName('fetchUsersSearch')[0].value = '';
            this.search = 0;
            this.fetchUsers(0, 0, 0);
        },

        fetchUsersSearch: function (e) {
            if (e.keyCode === 13) {
                var element = e.target;
                this.fetchUsers(0, 0, 0, element.value);
            }
        },

        editUser(user) {
            this.user.id = user.id;
            this.user.first_name = user.first_name;
            this.user.last_name = user.last_name;
            this.user.phone = user.phone;
            this.user.email = user.email;
            this.user.user_type = user.user_type;
            this.user.status = user.status;
        },

        addUser(user) {
            // this.$refs.form.submit();
            fetch('/api/user', {
                method: 'post',
                body: JSON.stringify(this.user),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'false') {
                        alert('the email is already taken or name is empty');
                    } else {
                        this.clearForm();
                        this.fetchUsers();
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
                    this.fetchUsers();
                })
                .catch(err => console.log(err));
        },

        clearForm() {
            this.user.id = '';
            this.user.first_name = '';
            this.user.last_name = '';
            this.user.phone = '';
            this.user.email = '';
            this.user.user_type = '';
            this.user.status = '';
            closeAllModals();
        }
    }
}
</script>
