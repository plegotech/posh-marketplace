<template>

    <div class="container-fluid pending-vend">

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form ref="form">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" v-model="user.first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" v-model="user.last_name" class="form-control" placeholder="Last Name">
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
                            <select class="form-control" v-model="user.verified">
                                <option value="yes">YES</option>
                                <option value="no">NO</option>
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">First Name <img class="shuffle" src="/img/shuffle.png"></th>
                            <th scope="col">Last Name <img class="shuffle" src="/img/shuffle.png"></th>
                            <th scope="col">Email Address <img class="shuffle" src="/img/shuffle.png"></th>
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
                                <span><span style="text-transform: uppercase">{{ user.verified }}</span></span>
                            </td>
                            <td>
                                <button class="cst-slct">
                                    <img src="/img/more.png" class="more-opt" alt="">
                                    <ul class="more-opts">
                                        <li @click="editUser(user)" data-toggle="modal" data-target=".bd-example-modal-lg">Edit</li>
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
                            <img src="/img/prev-arrow.png" @click="fetchUsers(current_page-1)" class="prev-itm" alt="">
                            <img src="/img/next-arrow.png" @click="fetchUsers(current_page+1)" class="next-itm" alt="">
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
            users:              [],
            to:                 null,
            from:               null,
            total:              null,
            current_page:       null,
            user: {
                id: '',
                first_name: '',
                last_name: '',
                phone: '',
                email: '',
                user_type: '',
                verified: '',
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
        fetchUsers(page = 0, per_page) {
            var url = '/api/users/user';
            // var per_page = document.getElementById("per_page").value;

            if(per_page > 0) {
                url += '/' + per_page;
            }

            if(page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
            .then(res => res.json())
            .then(res => {
                this.users          = res.data;
                this.to             = res.to;
                this.from           = res.to - res.per_page;
                this.total          = res.total;
                this.current_page   = res.to / res.per_page;
            })
            .catch(err => console.log(err));
        },

        editUser(user) {
            this.user.id            = user.id;
            this.user.first_name    = user.first_name;
            this.user.last_name     = user.last_name;
            this.user.phone         = user.phone;
            this.user.email         = user.email;
            this.user.user_type     = user.user_type;
            this.user.verified      = user.verified;
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
                    this.clearForm();
                    this.fetchUsers();
                })
                .catch(err => console.log(err));
        },

        markInactive(user_id) {
            var url = '/api/user/toggle-activation/' + user_id;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    this.fetchUsers();
                })
                .catch(err => console.log(err));
        },

        clearForm() {
            this.user.id            = '';
            this.user.first_name    = '';
            this.user.last_name     = '';
            this.user.phone         = '';
            this.user.email         = '';
            this.user.user_type     = '';
            this.user.verified      = '';
            closeAllModals();
        }
    }
}
</script>
