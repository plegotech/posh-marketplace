<template>

    <div class="container-fluid pending-vend manage-websites">

        <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div class="top-newOrder">
                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-3">
                                    <router-link class="box-selection" :to="{ name: 'seller-headerfooter'}">
                                        <img src="/img/mail-account.png" alt="">
                                        <h1>Headers & Footers</h1>
                                    </router-link>
                                </div>
                                <div class="col-sm-3">
                                    <a class="box-selection">
                                        <img src="/img/choose-page.png" alt="">
                                        <h1>Manage Pages</h1>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="box-selection">
                                        <img src="/img/mail-account.png" alt="">
                                        <h1>Products</h1>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="box-selection">
                                        <img src="/img/price-tag.png" alt="">
                                        <h1>Promotion Deals</h1>
                                    </a>
                                </div>
                            </div>
                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-4">
                                    <router-link class="box-selection" :to="{ name: 'seller-sliders'}">
                                        <img src="/img/mail-account.png" alt="">
                                        <h1>Slider Section</h1>
                                    </router-link>
                                </div>
                                <div class="col-sm-4">
                                    <router-link class="box-selection" :to="{ name: 'seller-categoryimages'}">
                                        <img src="/img/mail-account.png" alt="">
                                        <h1>Category thumbnails</h1>
                                    </router-link>
                                </div>
                                
                                <div class="col-sm-4">
                                    <router-link class="box-selection" :to="{ name: 'seller-promotion'}">
                                        <img src="/img/price-tag.png" alt="">
                                        <h1>Promotion Deals</h1>
                                    </router-link>
                                </div>
                            </div>
                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-4">
                                    <a class="box-selection">
                                        <img src="/img/separate-by-using-blank-sheets.png" alt="">
                                        <h1>Change Template</h1>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <router-link class="box-selection" :to="{ name: 'seller-aboutus'}">
                                        <img src="/img/info.png" alt="">
                                        <h1>About Us</h1>
                                    </router-link>
                                </div>
                                <div class="col-sm-4">
                                    <a class="box-selection">
                                        <img src="/img/mail-account.png" alt="">
                                        <h1>Contact Us</h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
