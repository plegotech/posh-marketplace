<template>
    <div class="container-fluid pending-vend">
        <br>
        <div class="prof-area vendor-pro-b1">
            <div class="row">
                <div class="col-sm-4">
                    <div class="user-prof">
                        <img src="/img/user_profile.png" alt="">
                        <h1>{{ user.first_name }} {{ user.last_name }}</h1>
                        <span>{{ user.email }}</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <table class="user-desc">
                        <tbody>
                        <tr>
                            <td>Company Name</td>
                            <td>{{ company.name }}</td>
                        </tr>
                        <tr>
                            <td>Company Phone</td>
                            <td>{{ company.phone }}</td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>{{ user.phone }}</td>
                        </tr>
                        <tr v-if="user.user_type == 'seller'">
                            <td>Website URL</td>
                            <td>www.plego.com</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class=" col-sm-4">
                    <button @click="showProfileEditForm" class="edit">
                        <img src="/img/edit.png" alt="">EDIT PROFILE
                    </button>
                </div>

                <div id="userProfile" class="col-sm-12" style="display: none">
                <div class="row">
                <div class="col-sm-6">
                    <label>First Name:</label>
                    <input type="text" class="form-control"
                           v-model="user_data.first_name"
                           :placeholder="user_data.first_name" /><br>
                </div>
                <div class="col-sm-6">
                    <label>Last Name:</label>
                    <input type="text" class="form-control"
                           v-model="user_data.last_name"
                           :placeholder="user_data.last_name" /><br>
                </div>
                <div class="col-sm-6">
                    <label>Email:</label>
                    <input type="text" class="form-control"
                           v-model="user_data.email"
                           :placeholder="user_data.email" /><br>
                </div>
                <div class="col-sm-6">
                    <label>Phone:</label>
                    <input type="text" class="form-control"
                           v-model="user_data.phone"
                           :placeholder="user_data.phone" /><br>
                </div>
                <div class="offset-sm-3 col-sm-6">
                    <button class="primary" @click="updateProfile">Update</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="prof-area vendor-pro-b2">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mini-head">Company Location</h1>
                </div>
                <div class="col-sm-6">
                    <button class="add-new" style="display:none">
                        <img src="/img/add.png" alt="">ADD NEW
                    </button>
                    <button class="edit sm-wd" @click="showCompanyEditForm">
                        <img src="/img/edit.png" alt="">EDIT
                    </button>
                </div>

                <div id="companyEdit" class="col-sm-12" style="display: none">
                <div class="row">
                <div class="col-sm-6">
                    <label>Company Name:</label>
                    <input type="text" class="form-control"
                           v-model="company_data.name"
                           :placeholder="company_data.name" /><br>
                           </div>
                            <div class="col-sm-6">
                    <label>Phone:</label>
                    <input type="text" class="form-control"
                           v-model="company_data.phone"
                           :placeholder="company_data.phone" /><br>
                           </div>
                            <div class="col-sm-6">
                    <label>Address:</label>
                    <input type="text" class="form-control"
                           v-model="company_data.address"
                           :placeholder="company_data.address" /><br>
                           </div>
                            <div class="col-sm-6">
                    <label>State:</label>
                    <input type="text" class="form-control"
                           v-model="company_data.state"
                           :placeholder="company_data.state" /><br>
                           </div>
                            <div class="col-sm-6">
                    <label>City:</label>
                    <input type="text" class="form-control"
                           v-model="company_data.city"
                           :placeholder="company_data.city" /><br>
                           </div>
                            <div class="col-sm-6">
                    <label>Zip Code:</label>
                    <input type="text" class="form-control"
                           v-model="company_data.zip_code"
                           :placeholder="company_data.zip_code" /><br>
                           </div>
                            <div class="offset-sm-3 col-sm-6">
                    <button class="primary" @click="updateCompany">Update</button>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <table class="comp-addr">
                        <tbody>
                        <tr>
                            <td>
                                <h2>Address</h2>
                                <span>{{ company.address }}</span>
                            </td>
                            <td>
                                <h2>State</h2>
                                <span>{{ company.state }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>City</h2>
                                <span>{{ company.city }}</span>
                            </td>
                            <td>
                                <h2>Zip Code</h2>
                                <span>{{ company.zip_code }}</span>
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
import {mapActions} from "vuex";

export default {
    data() {
        return {
            user: this.$store.state.auth.user,
            company_show: 1,
            company: null,
            user_data: {
                first_name: null,
                last_name: null,
                email: null,
                phone: null,
                id: null,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            company_data: {
                id:             null,
                name:           null,
                phone:          null,
                address:        null,
                state:          null,
                city:           null,
                zip_code:       null,
                _token:         document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    created() {
        this.user_data.id           = this.user.id;
        this.user_data.phone        = this.user.phone;
        this.user_data.email        = this.user.email;
        this.user_data.last_name    = this.user.last_name;
        this.user_data.first_name   = this.user.first_name;
        console.log('Component mounted.')
        this.getUserCompanyData();
    },
    methods: {
        ...mapActions({
            signIn:'auth/login'
        }),
        showCompanyEditForm() {
            document.getElementById('companyEdit').style.display = 'block';
        },
        hideCompanyEditForm() {
            document.getElementById('companyEdit').style.display = 'none';
        },
        showProfileEditForm() {
            document.getElementById('userProfile').style.display = 'block';
        },
        hideProfileEditForm() {
            document.getElementById('userProfile').style.display = 'none';
        },
        updateCompany() {
            var object = this;
            fetch('/api/update-company', {
                method: 'post',
                body: JSON.stringify(this.company_data),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'false') {
                        alert('Please fill the missing fields first.');
                    } else {
                        object.getUserCompanyData();
                        object.hideCompanyEditForm();
                    }
                })
                .catch(err => console.log(err));
        },
        updateProfile() {
            var object = this;
            fetch('/api/user', {
                method: 'post',
                body: JSON.stringify(this.user_data),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'false') {
                        alert('Please fill the missing fields first.');
                    } else {
                        this.signIn();
                        object.getUserCompanyData();
                        object.hideProfileEditForm();
                    }
                })
                .catch(err => console.log(err));
        },
        getUserCompanyData() {
            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/user-company/' + this.user.id;

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.company                    = res;
                    this.company_data.id            = res.id;
                    this.company_data.name          = res.name;
                    this.company_data.phone         = res.phone;
                    this.company_data.address       = res.address;
                    this.company_data.state         = res.state;
                    this.company_data.city          = res.city;
                    this.company_data.zip_code      = res.zip_code;
                })
                .catch(err => console.log(err))
                .finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        }
    }
}
</script>
