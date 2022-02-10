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
                <div class="col-sm-3 sellerReg-opt "><span class="number-opt-b">4</span> Choose Template</div>
            </div>
            <div class="container my-5">
                <div class="tier-box-area">
                    <div class="row mt-5 px-5">
                        <div class="col-sm-12 text-center">
                            <div @click="lastStep()" class="back-to-paw"><i class="fas fa-chevron-left"></i>Back</div>
                            <h2 class="main-title mb-4">Grab Your .com</h2></div>
                        <div class="col-sm-12">

                            <div class="input-group justify-content-center select-temp mb-5">
                                <input v-model="seller.domain" type="text" class="form-control search-si-input"
                                       placeholder="williamson.com"
                                       v-on:keypress="checkDomainAvailbility">
                                <div class="input-group-append">
                                    <button @click="checkDomain" class="primary search-ic" type="button">
                                        Search <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div v-if="valid_domain > 0" class="input-group justify-content-center select-temp mb-5">
                                <p>
                                    Please enter a valid domain.
                                </p>
                            </div>

                            <div class="row" v-if="show_response > 0">
                                <div v-if="available > 0" class="col-sm-12">
                                    <div class="for-domain-message">
                                        <div class="site-al-me">
                                            <i class="domain-alert available-icon"></i>
                                            {{ seller.domain }}
                                            <div class="site-do-me">Available</div>
                                        </div>
                                        <div class="mess-tdn">
                                            This domain is available.
                                        </div>
                                    </div>
                                </div>
                                <div v-if="not_available > 0" class="col-sm-12">
                                    <div class="for-domain-message">
                                        <div class="site-al-me">
                                            <i class="domain-alert taken-icon"></i>
                                            {{ seller.domain }}
                                            <div class="site-do-me">Taken</div>
                                        </div>
                                        <div class="mess-tdn">
                                            This domain name has already been taken.
                                        </div>
                                    </div>
                                </div>
                                <div v-if="not_available > 0" class="col-sm-12">
                                    <div class=""><h5>How about one of these?</h5></div>
                                    <div class="sug-domain-list">
                                        <div v-for="domains in suggestions" class="list-box-domain">
                                            <div class="sugBoxes">
                                                <div class="sug-d-box" @click="setDomain(domains.domain)">{{ domains.domain }}</div>
                                            </div>
                                            <div class="sug-backt" @click="setDomain(domains.domain)">
                                                <svg aria-hidden="true" width="48" height="48" focusable="false"
                                                     viewBox="0 0 60 60" fill="#000000"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M38.8 18.5877H33.216V24.2856H30.384V18.5877H24.8V15.6979H30.384V10H33.216V15.6979H38.8V18.5877Z"></path>
                                                    <path
                                                        d="M38.3655 44.8572C38.857 44.8572 39.3375 45.008 39.7461 45.2905C40.1548 45.5731 40.4733 45.9747 40.6614 46.4445C40.8495 46.9144 40.8987 47.4314 40.8028 47.9302C40.7069 48.429 40.4703 48.8872 40.1227 49.2468C39.7752 49.6065 39.3324 49.8514 38.8503 49.9506C38.3683 50.0498 37.8686 49.9989 37.4145 49.8043C36.9604 49.6096 36.5723 49.28 36.2993 48.8572C36.0262 48.4343 35.8805 47.9372 35.8805 47.4286C35.8805 47.0909 35.9447 46.7565 36.0696 46.4445C36.1945 46.1326 36.3776 45.8491 36.6083 45.6103C36.8391 45.3715 37.113 45.1821 37.4145 45.0529C37.716 44.9237 38.0392 44.8572 38.3655 44.8572ZM25.388 50C26.0471 50 26.6792 49.7291 27.1452 49.2468C27.6112 48.7646 27.8731 48.1106 27.8731 47.4286C27.8731 46.7466 27.6112 46.0925 27.1452 45.6103C26.6792 45.1281 26.0471 44.8572 25.388 44.8572C24.7501 44.8846 24.1477 45.1688 23.7093 45.6492C23.2709 46.1295 23.0311 46.768 23.041 47.4286C23.0242 47.7588 23.0724 48.0891 23.1827 48.3995C23.2929 48.7099 23.4629 48.9939 23.6823 49.2343C23.9018 49.4747 24.1661 49.6666 24.4593 49.7982C24.7525 49.9298 25.0684 49.9984 25.388 50V50ZM40.5486 42.8572H23.1854L19.0436 24.2858H16V21.4287H21.2399L22.8328 28.5715H44L40.5486 42.8572ZM25.3817 40H38.3914L40.4623 31.4287H23.4705L25.3817 40Z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="next > 0" class="form-row text-center col-sm-12 my-5">
                            <button @click="sellerStoreDomain()" type="button" class="primary rsv-bx mx-424">
                                <strong> {{ processing ? "PLEASE WAIT..." : "NEXT" }} </strong><span class="dr-arrow"><img src="/img/double-right-arrow.png"
                                                                                  height="24" width="24"
                                                                                  class="img-fluid img-m100"></span>
                            </button>
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
                domain: null,
                seller_id: null,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            show_response: 0,
            valid_domain: 0,
            available: 0,
            next: 0,
            not_available: 0,
            suggestions: [],
        }
    },
    created() {
        this.seller.seller_id =  this.$route.params.user_id;
    },
    methods: {
        lastStep() {
            this.$router.push({name: 'seller-signup-tier', params: { user_id: this.seller.seller_id }});
        },
        async sellerStoreDomain()
        {
            this.processing = true;
            var object = this;
            fetch('/api/seller/domain', {
                method: 'post',
                body: JSON.stringify(this.seller),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success == 'true') {
                        object.$router.push({name: 'seller-final', params: { user_id: data.user_id }});
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
        setDomain(domain) {
            this.seller.domain = domain;
            this.checkDomain();
        },
        checkDomain() {
            this.valid_domain = 0;
            this.not_available = 0;
            this.available = 0;
            this.next = 0;

            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/domain-hosting/domain/' + this.seller.domain;

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    if (res.code == 'INVALID_BODY') {
                        this.valid_domain = 1;
                    } else {
                        if (res.available) {
                            this.available = 1;
                            this.show_response = 1;
                            this.next = 1;
                        }
                        if (!res.available) {
                            this.not_available = 1;
                            this.show_response = 1;
                            this.suggestions = res.suggestions;
                        }
                    }
                    console.log('-----------------------');
                    console.log(res);
                    console.log('-----------------------');
                })
                .catch(err => console.log(err))
                .finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        checkDomainAvailbility: function (e) {
            if (e.keyCode === 13) {
                this.checkDomain();
            }
        }
    }
}
</script>
