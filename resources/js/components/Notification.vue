<template>
    <div class="container-fluid pending-vend">
        <br>
        
        
        <div class="prof-area vendor-pro-b2 listofNoti">
            <div class="row">                
                <div class="col-12">
                <ul class="noti-list-bx">
                    <li><a href="#"><strong>ASUS TUF F15 Gaming Laptop, 15.6" </strong> <span class="noti-ful-des">Selected 1 Product Selected 1 Product</span> <span class="time-boxx"><span class="right-rem-bx">4 hours ago</span></span></a></li>
                    <li><a href="#"><strong>Full HD 144Hz Screen, Intel Core i7-10870H Processor,</strong> <span class="noti-ful-des">Selected 1 Product Selected 1 Product</span> <span class="time-boxx"><span class="right-rem-bx">4 hours ago</span></span></a></li>
                    <li><a href="#"><strong>NVIDIA GeForce GTX 1660 Ti, 32GB DDR4 Memory, 512GB SSD + 1TB HDD, RGB Backlit Keyboard, Windows 10 Home, Gray</strong> <span class="noti-ful-des">Selected 1 Product Selected 1 Product</span> <span class="time-boxx"><span class="right-rem-bx">4 hours ago</span></span></a></li>
                </ul>
                </div>   
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
            company_errors: [],
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
            this.company_errors = [];
            fetch('/api/update-company', {
                method: 'post',
                body: JSON.stringify(this.company_data),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == false) {
                        object.company_errors = data.errors;
                    } else {
                        object.getUserCompanyData();
                        object.hideCompanyEditForm();
                    }
                })
                .catch(err => console.log(err));
        },
        closeTab_UserProf(){
            var targetuserProfile_Id = document.getElementById('userProfile');
            targetuserProfile_Id.style.display='none';
        },
        closeTab_CompEdit(){
            var targetCompEdit_Id = document.getElementById('companyEdit');
            targetCompEdit_Id.style.display='none';
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
                    if (data.success == false) {
                        object.company_errors = data.errors;
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

