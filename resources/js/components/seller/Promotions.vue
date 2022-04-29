<template>

    <div class="container-fluid pending-vend manage-websites">

        <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div class="top-newOrder">

                        <div class="row justify-content-center">
                            <div class="col-sm-12"><h3 class="mb-5">Promotional Images</h3></div>   
                            <div class="col-sm-12"><h5 class="mb-3">Top Deals</h5></div>                         
                                <div class="col-sm-6 mb-5">
                                    <p class="sl-title mb-4">Image 1 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                    <div class="form-outline-ft mb-3">
                                        <input type="text" placeholder="Image URL" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png" style="width: 100%;">
                                    </div>
                                    <button class="img-title-up" >Upload Images</button>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <p class="sl-title mb-4">Image 2 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                    <div class="form-outline-ft mb-3">
                                        <input type="text" placeholder="Image URL" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png" style="width: 100%;">
                                    </div>
                                    <button class="img-title-up" >Upload Images</button>
                                </div>
                            </div>
                            <div class="row justify-content-center"> 
                            <div class="col-sm-12"><h5 class="mb-3">Mid Deals</h5></div>                         
                                <div class="col-sm-6 mb-5">
                                    <p class="sl-title mb-4">Image 1 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                    <div class="form-outline-ft mb-3">
                                        <input type="text" placeholder="Image URL" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png">
                                    </div>
                                    <button class="img-title-up" >Upload Images</button>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <p class="sl-title mb-4">Image 2 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                    <div class="form-outline-ft mb-3">
                                        <input type="text" placeholder="Image URL" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png">
                                    </div>
                                    <button class="img-title-up" >Upload Images</button>
                                </div>
                            </div>

                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-12">
                                    <div class="uploadimage-vup">
                                        <div class="upload-title-vup">
                                            <p>Promotional Images</p>
                                        </div>
                                        <div class="upload-image-vup">
                                            <img id="img-upload-vup" src="/img/img-upload-dummy.jpg" class="img-fluid img-upload-vup">
                                            <input type="file" multiple ref="file2" style="display: none" name="pro_images" @change="proImages" />
                                            <button class="img-title-up" @click="$refs.file2.click()">Upload Images</button>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button @click="addinfo" class="primary">SAVE</button>
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
            user:this.$store.state.auth.user,
            pro_images:        '',
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:{
        proImages(e) {
            this.pro_images= e.target.files;
        },        
        addinfo() {
            document.getElementById('ajaxLoader').style.display = 'block';
            this.processing = true;

            var object = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();
            data.append('seller_id', this.user.id);
            data.append('promotion', this.pro_images.length);

            for (const i of Object.keys(this.pro_images)) {
                data.append('pro_images_'+i, this.pro_images[i])
            }

            axios.post('/createpromotions', data, config)
                .then(function (res) {
                    var data = res.data;
                    if (data.success == 'true') {
                        alert('product created successfully.');
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
    }
}
</script>
