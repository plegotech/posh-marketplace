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
                                        <input type="text" placeholder="Image URL" v-model="link1" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png" style="width: 100%;">
                                    </div>
                                    <input type="file" ref="file1" style="display: none" @change="proImages1" />
                                    <button class="img-title-up" @click="$refs.file1.click()">Upload Image</button>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <p class="sl-title mb-4">Image 2 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                    <div class="form-outline-ft mb-3">
                                        <input type="text" placeholder="Image URL" v-model="link2" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png" style="width: 100%;">
                                    </div>
                                    <input type="file" ref="file2" style="display: none" @change="proImages2" />
                                    <button class="img-title-up" @click="$refs.file2.click()">Upload Image</button>
                                </div>
                            </div>
                            <div class="row justify-content-center"> 
                            <div class="col-sm-12"><h5 class="mb-3">Mid Deals</h5></div>                         
                                <div class="col-sm-6 mb-5">
                                    <p class="sl-title mb-4">Image 1 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                    <div class="form-outline-ft mb-3">
                                        <input type="text" placeholder="Image URL" v-model="link3" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png">
                                    </div>
                                    <input type="file" ref="file3" style="display: none" @change="proImages3" />
                                    <button class="img-title-up" @click="$refs.file3.click()">Upload Image</button>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <p class="sl-title mb-4">Image 2 <span class="sl-remove-logo">Remove <img class="rl-icon" src="/img/Vector.png"></span></p>
                                    <div class="form-outline-ft mb-3">
                                        <input type="text" placeholder="Image URL" v-model="link4" class="form-control-label" required>
                                        <label class="form-label">URL</label>
                                    </div>
                                    <div class="upload-site-logo">
                                        <img src="/img/no-image-available.png">
                                    </div>
                                    <input type="file" ref="file4" style="display: none" @change="proImages4" />
                                    <button class="img-title-up" @click="$refs.file4.click()">Upload Image</button>
                                </div>
                            </div>

                            <div class="row justify-content-center mix-boxmw">
                                <div class="col-sm-12">
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
            link1:        '',
            pro_images_top1:        '',
            link2:        '',
            pro_images_top2:        '',
            link3:        '',
            pro_images_bot1:        '',
            link4:        '',
            pro_images_bot2:        '',
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:{
        proImages1(e) {
            this.pro_images_top1= e.target.files[0];
        },        
        proImages2(e) {
            this.pro_images_top2= e.target.files[0];
        },        
        proImages3(e) {
            this.pro_images_bot1= e.target.files[0];
        },        
        proImages4(e) {
            this.pro_images_bot2= e.target.files[0];
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
            data.append('link4', this.link4)

            data.append('pro_images_top1', this.pro_images_top1);
            data.append('pro_images_top2', this.pro_images_top2);
            data.append('pro_images_bot1', this.pro_images_bot1);
            data.append('pro_images_bot2', this.pro_images_bot2);

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
