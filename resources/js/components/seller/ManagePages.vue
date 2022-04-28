<template>

    <div class="container-fluid pending-vend manage-websites">

        <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div class="top-newOrder">
                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-4">
                                    <router-link class="box-selection" :to="{ name: 'seller-headerfooter'}">
                                        <img src="/img/mail-account.png" alt="">
                                        <h1>Headers & Footers</h1>
                                    </router-link>
                                </div>
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
