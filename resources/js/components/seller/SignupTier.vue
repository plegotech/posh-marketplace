<template>

    <div class="seller-registration">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"><h1 class="main-title text-center my-2">Create Account</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-3 sellerReg-opt active"><span class="number-opt-b">1</span> Personal Details</div>
                <div class="col-sm-3 sellerReg-opt active"><span class="number-opt-b">2</span> Tier Details</div>
                <div class="col-sm-3 sellerReg-opt "><span class="number-opt-b">3</span> Domain Information</div>
                <div class="col-sm-3 sellerReg-opt "><span class="number-opt-b">4</span> Choose Template</div>
            </div>
            <div class="container my-5">
                <div class="tier-box-area">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="back-to-paw"><i class="fas fa-chevron-left"></i>Back</div>
                            <h1 class="main-title mb-4">Select Tier</h1></div>
                    </div>
                    <div class="row px-5">
                        <div class="col-sm-4 text-center">
                            <div id="tier_free" class="box-a-tier">
                                <i class="num-count-bx">1</i>
                                <div class="box-t-ins">
                                    <h4 class="txt-blue">Free Tier</h4>
                                    <ul>
                                        <li>Lorem Ipsum</li>
                                        <li>Lorem Ipsum</li>
                                        <li>Lorem Ipsum</li>
                                    </ul>
                                </div>
                                <button class="primary" @click="changeTierSelection('tier_free')">SELECT</button>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div id="tier_two" class="box-a-tier box-sha">
                                <i class="num-count-bx">2</i>
                                <div class="box-t-ins">
                                    <h4 class="txt-blue">Tier 2</h4>
                                    <ul>
                                        <li>Lorem Ipsum</li>
                                        <li>Lorem Ipsum</li>
                                        <li>Lorem Ipsum</li>
                                    </ul>
                                </div>
                                <button class="primary" @click="changeTierSelection('tier_two')">SELECT</button>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div id="tier_three" class="box-a-tier">
                                <i class="num-count-bx">3</i>
                                <div class="box-t-ins">
                                    <h4 class="txt-blue">Tier 3</h4>
                                    <ul>
                                        <li>Lorem Ipsum</li>
                                        <li>Lorem Ipsum</li>
                                        <li>Lorem Ipsum</li>
                                    </ul>
                                </div>
                                <button class="primary btn-vi-bx" @click="changeTierSelection('tier_three')">SELECT
                                </button>
                            </div>
                        </div>
                        <div class="my-5 form-row text-center col-sm-12">
                            <button @click="sellerStoreTier()" type="button" class="primary rsv-bx mx-424">
                                <strong> {{ processing ? "PLEASE WAIT..." : "NEXT" }} </strong><span class="dr-arrow"><img src="/img/double-right-arrow.png"
                                                                                  height="24" width="24"
                                                                                  class="img-fluid img-m100"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input id="selected_tier" type="hidden" v-model="seller.tier" value=""/>
    </div>
</template>

<script>
export default {
    data() {
        return {
            processing: false,
            seller: {
                seller_id: null,
                tier: 2,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    created() {
        this.seller.seller_id =  this.$route.params.user_id;
    },
    methods: {
        changeTierSelection(type) {
            let tiers = document.getElementsByClassName('box-a-tier');

            for (var i = 0; i < tiers.length; i++) {
                tiers[i].classList.remove('box-sha');
            }

            let selected_tier = document.getElementById(type);
            selected_tier.classList.add('box-sha');
            this.seller.tier = type;
        },
        async sellerStoreTier()
        {
            this.processing = true;
            var object = this;
            fetch('/api/seller/tier', {
                method: 'post',
                body: JSON.stringify(this.seller),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'true') {
                        object.$router.push({name: 'seller-signup-domain', params: { user_id: data.user_id }});
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
        }
    }
}
</script>
