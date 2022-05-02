<template>

    <div class="container-fluid pending-vend manage-websites">

        <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div class="top-newOrder">
                            <div class="row justify-content-center">
                            <div class="col-sm-12"><h3 class="mb-5">Slider Images</h3></div>
                            
                            <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">Image 1 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL" v-model="link1" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                    <img src="/img/no-image-available.png">
                                </div>
                                <input type="file" ref="file1" style="display: none" @change="sliderImages1" />
                                <button class="img-title-up" @click="$refs.file1.click()">Upload Image</button>
                            </div>
                             <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">Image 2 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL" v-model="link2" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                    <img src="/img/no-image-available.png">
                                </div>
                                <input type="file" ref="file2" style="display: none" @change="sliderImages2" />
                                <button class="img-title-up" @click="$refs.file2.click()">Upload Image</button>
                            </div>
                             <div class="col-sm-4 mb-5">
                                <p class="sl-title mb-4">Image 3 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                <div class="form-outline-ft mb-3">
                                    <input type="text" placeholder="Image URL" v-model="link3" class="form-control-label" required>
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="upload-site-logo">
                                    <img src="/img/no-image-available.png">
                                </div>
                                <input type="file" ref="file3" style="display: none" @change="sliderImages3" />
                                <button class="img-title-up" @click="$refs.file3.click()">Upload Image</button>

                            </div>
                        </div>

                            <div class="row justify-content-center mix-boxmw">
                                    <button @click="addinfo" class="primary">SAVE</button>
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
            slider_images_1:        '',
            slider_images_2:        '',
            slider_images_3:        '',
            link1:        '',
            link2:        '',
            link3:        '',
            
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:{
        sliderImages1(e) {
            this.slider_images_1= e.target.files[0];
        },        
        sliderImages2(e) {
            this.slider_images_2= e.target.files[0];
        },        
        sliderImages3(e) {
            this.slider_images_3= e.target.files[0];
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
            data.append('link1', this.link1)
            data.append('link2', this.link2)
            data.append('link3', this.link3)

            data.append('slider_images_1', this.slider_images_1);
            data.append('slider_images_2', this.slider_images_2);
            data.append('slider_images_3', this.slider_images_3);

            axios.post('/createsliders', data, config)
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
