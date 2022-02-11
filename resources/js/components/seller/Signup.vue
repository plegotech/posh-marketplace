<template>

    <div class="seller-registration">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"><h1 class="main-title text-center my-2">Create Account</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-3 sellerReg-opt active"><span class="number-opt-b">1</span> Personal Details</div>
                <div class="col-sm-3 sellerReg-opt"><span class="number-opt-b">2</span> Tier Details</div>
                <div class="col-sm-3 sellerReg-opt "><span class="number-opt-b">3</span> Domain Information</div>
                <div class="col-sm-3 sellerReg-opt "><span class="number-opt-b">4</span> Choose Template</div>
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
                        <select v-model="seller.gender" class="form-control-label select-custom-point">
                            <option disabled :value="null">Gender*</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="female">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.email" placeholder="Email Address*" class="form-control" type="email">
                    </div>
                    <div class="form-group col-md-6">
                        <input v-model="seller.company" placeholder="Company Name" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                    <div class="custom-file-upload">
                        <input type="file" ref="business_license" name="file" multiple="multiple" class="form-control" >
                    </div>
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

                    <div v-for="error in errors"  class="col-md-12 form-row text-center">
                        <p>{{ error[0] }}</p>
                    </div>
                    <div class="form-row text-center col-sm-12">
                        <button @click="sellerSignup()" type="button" class="primary rsv-bx mx-424"><strong>
                          {{ processing ? "PLEASE WAIT..." : "NEXT" }}
                        </strong><span class="dr-arrow"><img src="/img/double-right-arrow.png" height="24" width="24" class="img-fluid img-m100"></span></button>
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
            processing:                     false,
            errors:                         null,
            created_id:                     null,
            seller: {
                seller_id:                  null,
                first_name:                 null,
                last_name:                  null,
                gender:                     null,
                license:                    null,
                ein_number:                 null,
                address:                    null,
                city:                       null,
                state:                      null,
                phone:                      null,
                company:                    null,
                email:                      null,
                password:                   null,
                password_confirmation:      null,
                _token:                     document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    created() {
        this.seller.seller_id =  this.$route.params.user_id;
        if(this.seller.seller_id) {
            this.getUserCompanyData(this.seller.seller_id);
        }
        console.log('Component mounted.')
    },
    methods: {
        getUserCompanyData(seller_id) {
            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/user/company/' + seller_id;

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.seller.first_name      = res.first_name;
                    this.seller.last_name       = res.last_name;
                    this.seller.gender          = res.gender;
                    this.seller.license         = res.license;
                    this.seller.ein_number      = res.ein_number;
                    this.seller.address         = res.address;
                    this.seller.city            = res.city;
                    this.seller.state           = res.state;
                    this.seller.phone           = res.phone;
                    this.seller.company         = res.name;
                    this.seller.email           = res.email;
                    this.seller.seller_id       = res.user_id;
                })
                .catch(err => console.log(err))
                .finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        uploadBusinessLicenses(company_id) {
            var object = this;

            const config = {
              headers: {
                'content-type': 'multipart/form-data'
              }
            }

            let data = new FormData();
            data.append('business_licenses', this.business_licenses);

            for( var i = 0; i < this.$refs.business_license.files.length; i++){
              let file = this.$refs.business_license.files[i];
              data.append('license[' + i + ']', file);
            }

            data.append('company_id', company_id);

            axios.post('/seller/business-licenses', data, config)
                .then(function (res) {
                  var data = res.data;
                  if (data.success == 'true') {
                    alert('files were uploaded successfully.');
                    object.$router.push({name: "seller-signup-tier", params: { user_id: object.created_id }})
                  } else {
                    alert('there was some problem in uploading the files, please contact support.');
                    object.errors = data.errors;
                  }
                })
                .catch(function (res) {
                  console.log('--');
                  console.log(res);
                  console.log('--');
                })
                .finally(()=>{
                  this.processing = false;
                  document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        sellerSignup() {

            this.processing = true;

            var object = this;

            var business_licenses = this.$refs.business_license.files[0];

            if (!business_licenses) {
                alert('Please upload the business license');
                return;
            }

            document.getElementById('ajaxLoader').style.display = 'block';

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
                        this.created_id = data.user_id;
                        this.uploadBusinessLicenses(data.company);
                    } else if (data.success == 'in-progress') {
                        alert('There is an account against this email, sending your to the relevant screen to proceed.');
                        object.$router.push({name: data.step, params: { user_id: data.user_id }})
                        this.processing = false;
                    } else {
                        this.errors = data.errors;
                        this.processing = false;
                    }
                })
                .catch(function (error) {
                    // this.errors.push(error);
                    console.log(error);
                }).finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
    }
}
</script>
