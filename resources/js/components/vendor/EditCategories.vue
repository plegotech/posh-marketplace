<template>
    <div class="container-fluid pending-vend">       
        <div class="row mt-12">
            
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT for Categories -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        
                        <!-- START:: Edit main Category-->
                        <div class="row mt-5">
                                 <div class="col-sm-6">                                   
                                        <div class="form-outline-ft">
                                            <input type="text" v-model="name" class="form-control-label" required>
                                            <input type="hidden"  />
                                            <label class="form-label">Category Name</label>
                                        </div>                               
                                 </div>
                                 <div class="col-sm-3">
                                     <div class="uploadedcategory-icon">
                                        <img id="thumb" width="24" height="29" 
                                          :src="getImgUrll(this.thumb)"
                                          @error="
                                            $event.target.src =
                                              'https://posh-marketplace.plego.pro/img/product-images/997/no_image.png'
                                          " class="uploaded-icon-img" 
                                        />
                                         <p >Icon Image</p>
                                         </div>
                                 </div>
                                 <div class="col-sm-3">                           
                                    <div class="up-main-bx-1">
                                        <div class="form-outline-ft mb-5">
                                            <input type="file" ref="file" style="display: none" name="thumb" @change="changeThumb" />
                                            <button class="img-title-up form-control-label mt-1" @click="$refs.file.click()">Upload Image</button>
                                        </div>
                                    </div>    
                                 </div>
                        <div class="col-sm-12">     
                            <div>
                                    <button class="primary"  @click="saveCategories">SAVE</button>
                            </div>
                        </div>                                   
                                 </div>
                        
                       

                    </div>
                    <!-- END::: FIRST TAB CONTENT -->
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
            bfield:1,
            afield:1,

            cat_id: this.$route.query.id,
            catlist_ddl:[],
            catlist:[],
            name:null,
            thumb:null,
            parent:null,
            user:this.$store.state.auth.user,
            catlist_ddl_limit:false,
            filtersdata:[],
            filters:{},
            //img_url: "https://posh-marketplace.plego.pro/img/menu-template",
            //img_url: "http://localhost:8000/img/menu-template",
            img_url: "/img/menu-template/",
        }
    },
//
    mounted(){
        this.loadCategory();        
        this.getCategoryFilters();
    },
    methods:{
        rembrand(){
            if(this.bfield>1){
                $("#brand-"+this.bfield).show();
                this.bfield-=1;
            }
            //alert(this.bfield);
        },
        addbrand(){
            if(this.filters!=null){
                
            }
            //alert(this.bfield);
            if(this.bfield<5){
                this.bfield+=1;
                $("#brand-"+this.bfield).show();
            }
        },
        async getCategoryFilters() {

          let cat_result = axios.get("/api/category/pfilters/" + this.cat_id);
          if ((await cat_result).data != null) {
            this.filters = (await cat_result).data.filterlab;
          }
          console.log(this.filtersdata);
        },

        changeThumb(input){
            this.thumb = input.target.files[0]
            if (input.target.files && input.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumb').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.target.files[0]);
            }


        },
        async loadCategory(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/category/"+this.cat_id);
            console.warn("Check Data");
            const obj = (await result).data;
            if(obj!=null){
                this.name=obj.data.title
                this.thumb=obj.data.img
            }
            console.log(obj)
            document.getElementById('ajaxLoader').style.display = 'none';
        },
        saveCategories(){
            document.getElementById('ajaxLoader').style.display = 'block';
            
            var object = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();
            data.append('seller_id', this.user.id);
            data.append('cat_id', this.cat_id);
            data.append('title', this.name);
            data.append('img', this.thumb);
            data.append('parent_category_id', 0);

            axios.post('/create-category', data, config)
                .then(function (res) {
                    console.log(res);
                    var data = res.data;
                    if (data.success == 'true') {
                        alert('Category created successfully.');
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
                    //this.$route.push("categories");
                });

        },
        updateCategory(cat){            
            //alert(cat.id)
            this.name = cat.title
            this.parent=0
            this.cat_id = cat.id
        },
        deleteCategory(id){
            //alert(id)
            axios.post('/api/category/delete/'+id)
                .then(function (res) {
                    console.log(res);
                    var data = res.data;
                    if (data.success == 'true') {
                        alert('Category created successfully.');
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
                    this.loadCategories()
                });

        },
        getImgUrll(pet) {
            console.log(this.img_url + "/" + this.user.id + "/" + pet);
            return this.img_url + "/" + pet;
        },


    }
}
</script>
