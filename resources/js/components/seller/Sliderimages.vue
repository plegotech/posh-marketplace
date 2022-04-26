<template>
    <div class="container-fluid pending-vend">
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="top-newOrder myorder mb-4">
                    <div class="row mb-4 up-main-bx">
                        <div class="col-sm-6">
                            <div class="up-main-bx-1">
                                <h3>Shop Information:</h3>
                                <br>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.site_name" class="form-control-label" required>
                                    <label class="form-label">Shop Name</label>
                                </div>
                                
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.site_address" class="form-control-label" required>
                                    <label class="form-label">Address</label>          
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.site_domain" class="form-control-label" required>
                                    <label class="form-label">Domain</label>          
                                </div>
                                <div class="form-outline-ft mb-5">

                                    <input type="file" ref="file" style="display: none" name="logo" @change="changeLogo" />
                                    <button class="img-title-up form-control-label" @click="$refs.file.click()">Upload Image</button>


                                    <label class="form-label">Logo</label>          
                                </div>
                                <div class="form-outline-ft mb-5">
                                    
                                    <select class="form-control-label">
                                        <option value="1">Template 1</option>
                                        <option value="2">Template 2</option>
                                    </select>
                                    <label class="form-label">Template</label>          
                                </div>
                                <h3>Main Menu:</h3>
                                <br>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.main_menu_title" class="form-control-label" required>
                                    <label class="form-label">Title</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.main_menu_links.main_menu_link1" class="form-control-label" required>
                                    <label class="form-label">Link1</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.main_menu_links.main_menu_link2" class="form-control-label" required>
                                    <label class="form-label">Link2</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.main_menu_links.main_menu_link3" class="form-control-label" required>
                                    <label class="form-label">Link3</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.main_menu_links.main_menu_link4" class="form-control-label" required>
                                    <label class="form-label">Link4</label>
                                    
                                </div>
                                <h3>Company:</h3>
                                <br>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.company_title" class="form-control-label" required>
                                    <label class="form-label">Title</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.company_links.company_link1" class="form-control-label" required>
                                    <label class="form-label">Link1</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.company_links.company_link2" class="form-control-label" required>
                                    <label class="form-label">Link2</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.company_links.company_link3" class="form-control-label" required>
                                    <label class="form-label">Link3</label>
                                    
                                </div>
</div>
</div>

<div class="col-sm-6"><div class="up-main-bx-1">

<h3>Discover:</h3>
<br>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.discover_title" class="form-control-label" required>
                                    <label class="form-label">Title</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.discover_links.discover_link1" class="form-control-label" required>
                                    <label class="form-label">Link1</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.discover_links.discover_link2" class="form-control-label" required>
                                    <label class="form-label">Link2</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.discover_links.discover_link3" class="form-control-label" required>
                                    <label class="form-label">Link3</label>
                                    
                                </div>
<h3>Social:</h3>
<br>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.social_title" class="form-control-label" required>
                                    <label class="form-label">Title</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.social_links.social_link1" class="form-control-label" required>
                                    <label class="form-label">Facebook</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.social_links.social_link2" class="form-control-label" required>
                                    <label class="form-label">Twitter</label>
                                    
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.social_links.social_link3" class="form-control-label" required>
                                    <label class="form-label">Instagram</label>
                                    
                                </div>

<h3>About US:</h3>
<br>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="headerfooter.about_us" class="form-control-label" required>
                                    <label class="form-label">About US</label>
                                    
                                </div>
<h3>Slider Images:</h3>
<br>
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
<h3>Promotional Images:</h3>
<br>
                                    <div class="uploadimage-vup">
                                        <div class="upload-title-vup">
                                            <p>Promotion Images</p>
                                        </div>
                                        <div class="upload-image-vup">
                                            <img id="img-upload-vup" src="/img/img-upload-dummy.jpg" class="img-fluid img-upload-vup">
                                            <input type="file" multiple ref="file2" style="display: none" name="pro_images" @change="proImages" />
                                            <button class="img-title-up" @click="$refs.file2.click()">Upload Images</button>
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
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user:this.$store.state.auth.user,
            headerfooter: {
                site_name:                   '',
                site_address:              '',
                site_domain:              '',
                site_temp:              '',
                main_menu_title:        '',
                logo:        '',
                slider_images:        '',
                pro_images:        '',
                main_menu_links:{
                    main_menu_link1:        '',
                    main_menu_link2:        '',
                    main_menu_link3:        '',
                    main_menu_link4:        ''
                },
                company_title:        '',
                company_links:{
                    company_link1:        '',
                    company_link2:        '',
                    company_link3:        ''
                },
                discover_title:        '',
                discover_links:{
                    discover_link1:        '',
                    discover_link2:        '',
                    discover_link3:        ''
                },
                social_title:        '',
                social_links:{
                    social_link1:        '',
                    social_link2:        '',
                    social_link3:        '',
                },
                about_us:'',
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },
    mounted(){
        this.getHeaderFooter()
    },
    methods: {
        changeLogo(e) {
            this.headerfooter.logo= e.target.files[0];
        },
        sliderImages(e) {
            this.headerfooter.slider_images= e.target.files;
        },
        proImages(e) {
            this.headerfooter.pro_images= e.target.files;
        },

        addinfo() {

            document.getElementById('ajaxLoader').style.display = 'block';
            
            var object = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();
            data.append('seller_id', this.user.id);
            data.append('site_template', this.headerfooter.site_temp);
            data.append('domain', this.headerfooter.site_domain);
            data.append('h_shop_name', this.headerfooter.site_name);
            data.append('h_shop_address', this.headerfooter.site_address);
            data.append('about_us', this.headerfooter.about_us);
            data.append('logo', this.headerfooter.logo);
            data.append('sliders', this.headerfooter.slider_images.length);
            data.append('promotion', this.headerfooter.pro_images.length);
            data.append('f_main_menu_title', this.headerfooter.main_menu_title);
            data.append('f_main_menu_link1', this.headerfooter.main_menu_links.main_menu_link1);
            data.append('f_main_menu_link2', this.headerfooter.main_menu_links.main_menu_link2);
            data.append('f_main_menu_link3', this.headerfooter.main_menu_links.main_menu_link3);
            data.append('f_main_menu_link4', this.headerfooter.main_menu_links.main_menu_link4);

            data.append('f_company_title', this.headerfooter.company_title);
            data.append('f_company_link1', this.headerfooter.company_links.company_link1);
            data.append('f_company_link2', this.headerfooter.company_links.company_link2);
            data.append('f_company_link3', this.headerfooter.company_links.company_link3);

            data.append('f_discover_title', this.headerfooter.discover_title);
            data.append('f_discover_link1', this.headerfooter.discover_links.discover_link1);
            data.append('f_discover_link2', this.headerfooter.discover_links.discover_link2);
            data.append('f_discover_link3', this.headerfooter.discover_links.discover_link3);

            data.append('f_findus_title', this.headerfooter.social_title);
            data.append('f_findus_link1', this.headerfooter.social_links.social_link1);
            data.append('f_findus_link2', this.headerfooter.social_links.social_link2);
            data.append('f_findus_link3', this.headerfooter.social_links.social_link3);

            for (const i of Object.keys(this.headerfooter.slider_images)) {
                data.append('slider_images_'+i, this.headerfooter.slider_images[i])
            }

            for (const i of Object.keys(this.headerfooter.pro_images)) {
                data.append('pro_images_'+i, this.headerfooter.pro_images[i])
            }
            
            axios.post('/headerfooter', data, config)
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
        async getHeaderFooter(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get('/getheaderfooter/'+this.user.id);
            const data = (await result).data
            console.log("HeaderFooterData")
            console.log(data)
            this.headerfooter.site_name = data.h_shop_name
            this.headerfooter.site_address = data.h_shop_address
            this.headerfooter.site_domain = data.domain
            this.headerfooter.site_template = data.site_template
            this.headerfooter.main_menu_title = data.f_main_menu_title
            this.headerfooter.main_menu_links.main_menu_link1 = data.f_main_menu_links[0]
            this.headerfooter.main_menu_links.main_menu_link2 = data.f_main_menu_links[1]
            this.headerfooter.main_menu_links.main_menu_link3 = data.f_main_menu_links[2]
            this.headerfooter.main_menu_links.main_menu_link4 = data.f_main_menu_links[3]

            this.headerfooter.company_title = data.f_company_title
            this.headerfooter.company_links.company_link1 = data.f_company_links[0]
            this.headerfooter.company_links.company_link2 = data.f_company_links[1]
            this.headerfooter.company_links.company_link3 = data.f_company_links[2]

            this.headerfooter.discover_title = data.f_discover_title
            this.headerfooter.discover_links.discover_link1 = data.f_discover_links[0]
            this.headerfooter.discover_links.discover_link2 = data.f_discover_links[1]
            this.headerfooter.discover_links.discover_link3 = data.f_discover_links[2]


            this.headerfooter.social_title = data.f_findus_title
            this.headerfooter.social_links.social_link1 = data.f_findus_links[0]
            this.headerfooter.social_links.social_link2 = data.f_findus_links[1]
            this.headerfooter.social_links.social_link3 = data.f_findus_links[2]

            document.getElementById('ajaxLoader').style.display = 'none';
        }
    }
}
</script>
