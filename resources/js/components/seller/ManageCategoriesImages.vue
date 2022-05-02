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
                                    <img src="/img/no-image-available.png">
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
                                    <img src="/img/no-image-available.png">
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
                                    <img src="/img/no-image-available.png">
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
                                    <img src="/img/no-image-available.png">
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
                                    <img src="/img/no-image-available.png">
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

        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods : {
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


        }
    },
    
}
</script>
