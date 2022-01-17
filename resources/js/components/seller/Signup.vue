<template>

    <div class="seller-registration">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"><h1 class="main-title text-center my-2">Create Account</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-6 sellerReg-opt active"><span class="number-opt-b">1</span> Personal Details</div>
                <div class="col-sm-6 sellerReg-opt"><span class="number-opt-b">1</span> Store Details</div>
            </div>
            <div class="createAccount-bx my-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input v-model="seller.first_name" placeholder="First Name*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.last_name" placeholder="Last Name*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <select v-model="seller.gender" class="form-control">
                            <option value="" selected>Gender*</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.email" placeholder="Email Address*" class="form-control" type="email">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.company" placeholder="Company Name" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.licence" placeholder="Business License" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12">
                        <input v-model="seller.address" placeholder="Address*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.city" placeholder="City" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.state" placeholder="State" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.ein_number" placeholder="Ein Number*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.phone" placeholder="Phone Number*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.password" name="Password" placeholder="Password*" class="form-control" type="password">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.password_confirmation" name="Confirm Password" placeholder="Confirm Password*" class="form-control" type="password">
                    </div>

                    <div v-for="error in errors"  class="form-row text-center">
                        <p>{{ error[0] }}</p>
                    </div>
                    <div class="form-row text-center col-sm-12">
                        <button @click="sellerSignup()" type="button" class="primary rsv-bx mx-424"><strong>NEXT </strong><span class="dr-arrow"><img src="/img/double-right-arrow.png" height="24" width="24" class="img-fluid img-m100"></span></button>
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
            errors:                         null,
            seller: {
                first_name:                 null,
                last_name:                  null,
                gender:                     null,
                licence:                    null,
                ein_number:                 null,
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
        sellerSignup() {

            fetch('/api/seller/0', {
                method: 'post',
                body: JSON.stringify(this.seller),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'true') {
                        alert('account created successfully.');
                        this.$router.push({name: "seller-final"})
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
