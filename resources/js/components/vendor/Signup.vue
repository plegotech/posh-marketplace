<template>

    <div class="wrapper">
        <!-- START: REGISTRATION SCREEN -->
        <section class="registration-screen" id="registration-dvs">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-4 py-5 bg-primary-posh-m text-white ">
                        <div class="bgp-card-bx">
                            <div class="card-body">
                                <p class="mb-1 ">Welcome To</p>
                                <h2>Posh Marketplace</h2>
                            </div>
                            <div class="footer-copyright"><p>Copyright © 2021 Posh Market, Inc. All rights
                                reserved.</p></div>
                        </div>
                    </div>
                    <div class="col-md-8 py-5 bg-white">
                        <div class="registration-dvs-form text-center">
                            <h3 class="pb-1 txt-blue">Create Account</h3>
                            <p class="txt-gray regis-subtitle">Enter your details below to continue</p>
                            <form ref="form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input v-model="vendor.first_name" name="First Name" placeholder="First Name*" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="vendor.last_name" name="Last Name " placeholder="Last Name*" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input v-model="vendor.address" name="Address " placeholder="Address*" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="vendor.city" placeholder="City*" class="form-control" type="text">
                                    </div>
                                     <div class="form-group col-md-6">
                                        <input v-model="vendor.state" placeholder="State*" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select v-model="vendor.gender" class="form-control">
                                            <option value="">Gender*</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="vendor.phone" placeholder="Phone Number*" class="form-control" type="tel">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="vendor.company" placeholder="Company Name" class="form-control" type="text">
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <input type="number" v-model="vendor.subscription_fee" placeholder="Subscription Fees*" class="form-control">
                                    </div>-->
                                    <div class="form-group col-md-6">
                                        <input  v-model="vendor.email" placeholder="Email Address*" class="form-control" type="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="vendor.password" placeholder="Password*" class="form-control" type="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input v-model="vendor.password_confirmation" placeholder="Confirm Password*" class="form-control" type="password">
                                    </div>
                                </div>

                                <div v-for="error in errors"  class="form-row text-center">
                                    <p>{{ error[0] }}</p>
                                </div>
                                <div class="form-row text-center sub-btn-bx">
                                    <button @click="vendorSignup()" type="button" class="primary rsv-bx"><strong>REGISTER</strong></button>
                                    <p class="mt-3 mb-1">Already Have an account?</p>
                                    <span class="link-b-b">
                                        <router-link to="/"><strong>Sign-In</strong></router-link>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END::  REGISTRATION SCREEN -->
    </div>

</template>

<script>
export default {
    data() {
        return {
            errors:                         null,
            vendor: {
                gender:                     null,
                first_name:                 null,
                last_name:                  null,
                address:                    null,
                city:                       null,
                state:                      null,
                phone:                      null,
                company:                    null,
                subscription_fee:           null,
                email:                      null,
                password:                   null,
                password_confirmation:      null,
                _token:                     document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        vendorSignup() {

            fetch('/api/vendor', {
                method: 'post',
                body: JSON.stringify(this.vendor),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'true') {
                        alert('account created successfully.');
                        this.$router.push({name: "login"})
                    } else {
                        this.errors = data.errors;
                    }
                })
                .catch(function (error) {
                    // this.errors.push(error);
                    console.log(error);
                });
        },
    }

}
</script>
