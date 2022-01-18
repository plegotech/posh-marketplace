<template>

    <div class="seller-registration">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"><h1 class="main-title text-center my-2">Create Account</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-6 sellerReg-opt active"><span class="number-opt-b">1</span> Personal Details</div>
                <div class="col-sm-6 sellerReg-opt active"><span class="number-opt-b">2</span> Store Details</div>
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

                    <div class="row mt-5 pt-5 px-5">
                        <div class="col-sm-12 text-center">
                            <h1 class="main-title mb-4">Select Product Categories</h1>
                            <div class="input-group select-BC mb-5">
                                <div class="btn-bx-BC">
                                    <select v-model="seller.primary_category" class="form-control select-opt-BC">
                                        <option value="" selected>All</option>
                                        <option value="Components">Components</option>
                                        <option value="Computer Systems">Computer Systems</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Gaming">Gaming</option>
                                        <option value="Networking">Networking</option>
                                        <option value="Office Solutions">Office Solutions</option>
                                        <option value="Software Services">Software Services</option>
                                        <option value="Automotives">Automotives</option>
                                        <option value="Home & Tools">Home & Tools</option>
                                        <option value="Health & Sports">Health & Sports</option>
                                    </select>
                                </div>
                                <input type="text" v-model="seller.sub_categories" class="form-control search-bc-input"
                                       placeholder="Browse Category">
                                <div class="input-group-append">
                                    <button class="primary search-bc" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row selectTemplate">
                        <div class="col-sm-12 text-center">
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

                    <div class="row mt-5 px-5">
                        <div class="col-sm-12 text-center"><h2 class="main-title mb-4">Grab Your .com</h2></div>
                        <div class="col-sm-12">
                            <div class="input-group justify-content-center select-temp mb-5">
                                <input type="text" class="form-control search-si-input"
                                       placeholder="williamson.com">
                                <div class="input-group-append">
                                    <button class="primary search-ic" type="button">
                                        Search <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="for-domain-message">
                                        <div class="site-al-me"><i class="domain-alert taken-icon"></i>
                                            williamson.com
                                            <div class="site-do-me">Taken</div>
                                        </div>
                                        <div class="mess-tdn">This domain name has already been taken.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-5">
                                <div class="col-sm-12">
                                    <p class="sug-n-title">Suggested Names</p>
                                    <ul class="sug-name-tag ">
                                        <li>williamjoseph</li>
                                        <li>williamjohn</li>
                                        <li>williamsmith</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mb-5 mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group text-center">
                                        <label><input name="" type="checkbox"> Terms and Conditions</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <button class="primary btn-caccoutn">CREATE ACCOUNT</button>
                                </div>
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
