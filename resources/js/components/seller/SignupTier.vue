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
                        <div class="col-12 text-center"><h1 class="main-title mb-4">Select Tier</h1></div>
                    </div>
                    <div class="row px-5">
                        <div class="col-sm-4 text-center">
                            <div id="tier_free" class="box-a-tier">
                                <i class="num-count-bx">1</i>
                                <div class="box-t-ins">
                                    <h4 class="txt-blue">Free Tier</h4>
                                    <p>Only 10 Products</p>
                                </div>
                                <button class="primary" @click="changeTierSelection('tier_free')">SELECT</button>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div id="tier_two" class="box-a-tier box-sha">
                                <i class="num-count-bx">2</i>
                                <div class="box-t-ins">
                                    <h4 class="txt-blue">Tier 2</h4>
                                    <p>Only 50 Products</p>
                                </div>
                                <button class="primary" @click="changeTierSelection('tier_two')">SELECT</button>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div id="tier_three" class="box-a-tier">
                                <i class="num-count-bx">3</i>
                                <div class="box-t-ins">
                                    <h4 class="txt-blue">Tier 2</h4>
                                    <p>Only 200 Products</p>
                                </div>
                                <button class="primary btn-vi-bx" @click="changeTierSelection('tier_three')">SELECT</button>
                            </div>
                        </div>
                    </div>

                    

                   

                   
                </div>

            </div>
        </div>
        <input id="selected_tier" type="hidden" v-model="seller.tier" value="" />
        <input id="selected_template" type="hidden" v-model="seller.site_template" value="" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            seller: {
                tier: null,
                primary_category: null,
                sub_categories: null,
                site_template: null,
                domain: null
            }
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        changeTierSelection(type) {
            var tiers = document.getElementsByClassName('box-a-tier');

            for(var i = 0; i < tiers.length; i++) {
                tiers[i].classList.remove('box-sha');
            }

            var selected_tier = document.getElementById(type);
            selected_tier.classList.add('box-sha');
            document.getElementById('selected_tier').value = type;
        },
        changeTemplateSelection(type) {
            var tiers = document.getElementsByClassName('img-stemplate');

            for(var i = 0; i < tiers.length; i++) {
                tiers[i].classList.remove('active');
            }

            var selected_tier = document.getElementById(type);
            selected_tier.classList.add('active');
            document.getElementById('selected_template').value = type;
        }
    }
}
</script>
