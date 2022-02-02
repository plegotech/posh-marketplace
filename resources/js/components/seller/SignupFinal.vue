<template>

    <div class="seller-registration">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"><h1 class="main-title text-center my-2">Create Account</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-3 sellerReg-opt active"><span class="number-opt-b">1</span> Personal Details</div>
                <div class="col-sm-3 sellerReg-opt active"><span class="number-opt-b">2</span> Tier Details</div>
                <div class="col-sm-3 sellerReg-opt active"><span class="number-opt-b">3</span> Domain Information</div>
                <div class="col-sm-3 sellerReg-opt active"><span class="number-opt-b">4</span> Choose Template</div>
            </div>
            <div class="container my-5">
                <div class="tier-box-area">
                    <div class="row selectTemplate">
                        <div class="col-sm-12 text-center">
                           <div @click="lastStep()" class="back-to-paw">
                             <i class="fas fa-chevron-left"></i>Back
                           </div>
                          <h1 class="main-title mb-4">Select Template</h1>
                        </div>
                        <div class="col-sm-4">
                            <img id="template_01" src="/img/templae-sample-1.png" class="img-stemplate"
                            @click="changeTemplateSelection('template_01')">
                        </div>
                        <div class="col-sm-4">
                            <img id="template_02" src="/img/templae-sample-2.png" class="img-stemplate"
                            @click="changeTemplateSelection('template_02')">
                        </div>
                        <div class="col-sm-4">
                            <img id="template_03" src="/img/templae-sample-3.png" class="img-stemplate"
                            @click="changeTemplateSelection('template_03')">
                        </div>
                    </div>
                    <div class="row justify-content-center my-4">
                    <div class="col-sm-3 text-center">
                        <button @click="sellerStoreTemplate()" type="button" class="primary rsv-bx"><strong>
                            {{ processing ? "PLEASE WAIT..." : "REGISTER" }}
                        </strong></button>
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
            seller: {
                site_template:  null,
                seller_id:      null,
                _token:         document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    created() {
        this.seller.seller_id =  this.$route.params.user_id;
    },
    methods: {
        lastStep () {
            this.$router.push({name: 'seller-signup-domain', params: { user_id: this.seller.seller_id }});
        },
        async sellerStoreTemplate()
        {
            this.processing = true;
            var object = this;
            fetch('/api/seller/site_template', {
                method: 'post',
                body: JSON.stringify(this.seller),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'true') {
                        alert('Registration is completed, you will be notified once your account is approved.');
                        object.$router.push({name: 'login-seller'});
                    } else {
                        this.errors = data.errors;
                    }
                    this.processing = false;
                })
                .catch(function (error) {
                    // this.errors.push(error);
                    console.log(error);
                }).finally(function () {
                document.getElementById('ajaxLoader').style.display = 'none';
            });
        },
        changeTemplateSelection(type) {
            var tiers = document.getElementsByClassName('img-stemplate');

            for(var i = 0; i < tiers.length; i++) {
                tiers[i].classList.remove('active');
            }

            var selected_tier = document.getElementById(type);
            selected_tier.classList.add('active');
            this.seller.site_template = type;
        }
    }
}
</script>
