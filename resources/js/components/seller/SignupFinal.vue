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
                           <div class="back-to-paw"><i class="fas fa-chevron-left"></i>Back</div> <h1 class="main-title mb-4">Select Template</h1>
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
                        <button type="button" class="primary rsv-bx"><strong>REGISTER</strong></button>
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
