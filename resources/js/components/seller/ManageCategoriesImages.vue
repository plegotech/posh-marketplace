<template>

    <div class="container-fluid pending-vend manage-websites">

        <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div class="top-newOrder">
                            <div class="row justify-content-center">

                            <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">New Arrivals <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL" v-model="link_new" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                        <img
                                          :src="getImgUrll(this.images_new)"
                                          @error="
                                            $event.target.src =
                                              'https://posh-marketplace.plego.pro/img/product-images/997/no_image.png'
                                          " style="width: 100%;"
                                        />
                                </div>
                                <input type="file" ref="file1" style="display: none" name="images_new" @change="changeNew" />
                                <button class="img-title-up" @click="$refs.file1.click()">Upload Image</button>
                            </div>
                            <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">Hot Categories <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL" v-model="link_cat" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                        <img
                                          :src="getImgUrll(this.images_cat)"
                                          @error="
                                            $event.target.src =
                                              'https://posh-marketplace.plego.pro/img/product-images/997/no_image.png'
                                          " style="width: 100%;"
                                        />
                                </div>
                                <input type="file" ref="file2" style="display: none" name="images_cat" @change="changeCat" />
                                <button class="img-title-up" @click="$refs.file2.click()">Upload Image</button>
                            </div>
                            <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">Hot Items Gaming <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL" v-model="link_hot" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                        <img
                                          :src="getImgUrll(this.images_hot)"
                                          @error="
                                            $event.target.src =
                                              'https://posh-marketplace.plego.pro/img/product-images/997/no_image.png'
                                          " style="width: 100%;"
                                        />
                                </div>
                                <input type="file" ref="file3" style="display: none" name="images_hot" @change="changeHot" />
                                <button class="img-title-up" @click="$refs.file3.click()">Upload Image</button>
                            </div>
                            <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">Electronics Deal <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL" v-model="link_elec" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                        <img
                                          :src="getImgUrll(this.images_elec)"
                                          @error="
                                            $event.target.src =
                                              'https://posh-marketplace.plego.pro/img/product-images/997/no_image.png'
                                          " style="width: 100%;"
                                        />
                                </div>
                                <input type="file" ref="file4" style="display: none" name="images_elec" @change="changeElec" />
                                <button class="img-title-up" @click="$refs.file4.click()">Upload Image</button>

                            </div>
                            <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">Home & Kitchen <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL"  v-model="link_home" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                        <img
                                          :src="getImgUrll(this.images_home)"
                                          @error="
                                            $event.target.src =
                                              'https://posh-marketplace.plego.pro/img/product-images/997/no_image.png'
                                          " style="width: 100%;"
                                        />
                                </div>
                                <input type="file" ref="file5" style="display: none" name="images_home" @change="changeHome" />
                                <button class="img-title-up" @click="$refs.file5.click()">Upload Image</button>
                            </div>
                            </div>
                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-12">
                                    <button @click="addImages" class="primary">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

</template>

<script>
export default {
    data(){
        return {
            user:this.$store.state.auth.user,
            images_cat:'',
link_cat:null,
            images_elec:'',
link_elec:null,
            images_home:'',
link_home:null,
            images_hot:'',
link_hot:null,
            images_new:'',
link_new:null,
img_url: "https://posh-marketplace.plego.pro/img/product-images/",
        }
    },
    mounted() {
        console.log('Component mounted.')
this.getSlidersPromotionsCategoryImages()
    },
    methods : {
        async getSlidersPromotionsCategoryImages() {
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/api/seller/homepage/"+this.user.id);
            console.log((await result).data);
            if((await result).data.CatImages!=null){
            this.list_homepage = (await result).data
            this.images_cat = (await result).data.CatImages.images_cat;
            this.images_elec = (await result).data.CatImages.images_elec;
            this.images_hot = (await result).data.CatImages.images_hot;
            this.images_new = (await result).data.CatImages.images_new;
            this.images_home = (await result).data.CatImages.images_home;
            this.link_cat = (await result).data.CatImages.link_cat;
            this.link_elec = (await result).data.CatImages.link_elec;
            this.link_hot = (await result).data.CatImages.link_hot;
            this.link_new = (await result).data.CatImages.link_new;
            this.link_home = (await result).data.CatImages.link_home;
}
document.getElementById('ajaxLoader').style.display = 'none';
        },
        changeCat(e){
            this.images_cat = e.target.files[0]
        },
        changeElec(e){
            this.images_elec = e.target.files[0]
        },
        changeHome(e){
            this.images_home = e.target.files[0]
        },
        changeHot(e){
            this.images_hot = e.target.files[0]
        },
        changeNew(e){
            this.images_new = e.target.files[0]
        },
        addImages(){
            document.getElementById('ajaxLoader').style.display = 'block';
            
            var object = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let data = new FormData();
            data.append('seller_id', this.user.id);
            data.append('link_home', this.link_home);
            data.append('link_elec', this.link_elec);
            data.append('link_cat', this.link_cat);
            data.append('link_new', this.link_new);
            data.append('link_hot', this.link_hot);
            data.append('home', this.images_home);
            data.append('elec', this.images_elec);
            data.append('cat', this.images_cat);
            data.append('new', this.images_new);
            data.append('hot', this.images_hot);
            
            axios.post('/catimages', data, config)
                .then(function (res) {
                    console.log(res);
                    var data = res.data;
                    if (data.success == 'true') {
                        alert('Created successfully.');
                        object.clearForm();
                    } else {
                        object.errors = data.errors;
                    }
                })
                .catch(function (res) {
                    console.log(res);
                })
                .finally(()=>{
                    this.processing = false;
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        getImgUrll(pet) {
          return this.img_url + "/" + this.user.id + "/" + pet;
        },
    },
    
}
</script>