<template>

    <div class="container-fluid pending-vend manage-websites">

        <div class="row" style="margin-top:20px">
                    <div class="col-sm-12">
                        <div class="top-newOrder">
                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-12">
                                    <div class="uploadimage-vup">
                                        <div class="upload-title-vup">
                                            <p>Slider Images</p>
                                        </div>
                                        <div class="upload-image-vup">
                                            <img id="img-upload-vup" src="/img/img-upload-dummy.jpg" class="img-fluid img-upload-vup">
                                            <input type="file" multiple ref="file1" style="display: none" name="slider_images" @change="sliderImages" />
                                            <button class="img-title-up" @click="$refs.file1.click()">Upload Images</button>
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
            slider_images:        '',
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:{
        sliderImages(e) {
            this.slider_images= e.target.files;
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
            data.append('sliders', this.slider_images.length);

            for (const i of Object.keys(this.slider_images)) {
                data.append('slider_images_'+i, this.slider_images[i])
            }

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
