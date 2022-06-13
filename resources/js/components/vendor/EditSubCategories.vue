<template>
    <div class="container-fluid pending-vend">       
        <div class="row mt-12">
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT for Categories -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        
                        <!-- START:: Add new Sub Category-->
                        <div class="row">
                            <div class="col-lg-6 col-6 mb-4">
                                <div class="form-outline-ft">
                                    <select class="form-control-label select-custom-point" v-model="parent" name="" id="">
                                        <option value="" selected>Select Main Category</option>
                                        <option v-for="(category, index) in this.catlist_ddl"
                                                :value="category.id">{{ category.title }}</option>
                                    </select>
                                    <span class="form-label">Category Parent</span>
                                    </div>
                            </div>
                                <div class="col-sm-6">                                   
                                        <div class="form-outline-ft mb-5">
                                            <input type="text" v-model="name" class="form-control-label" required>
                                            <label class="form-label">Enter sub Category Name</label>
                                        </div>                                  
                                 </div>
                                </div>



                                <div class="row">
                                 <div class="col-sm-6 ">
                                     <div class="row">                                    
<!-- START:: ENTER BRAND -->
                                   
                                    <div class="col-12 mb-5">
                                        <h4>Brand List</h4>




                                    <div class="produt-list-bx brand-list " v-for="(element, index) in brandslab" :key="index">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="brandslab[index]" id="attri-2" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <!--<div class="addbtn-brand"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  -->
                                    </div>
                                    <div class="produt-list-bx brand-list ">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="brands.brand1" id="brand-2" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <!--<div class="addbtn-brand" @click="rembrand"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  -->
                                        <div class="addbtn-brand" @click="addbrand"><div class="btn-primary"><i class="fa fa-plus"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="brand2" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="brands.brand2" id="brand-2" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="rembrand(2)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="brand3" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="brands.brand3" id="brand-2" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="rembrand(3)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="brand4" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="brands.brand4" id="brand-2" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="rembrand(4)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="brand5" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="brands.brand5" id="brand-2" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="rembrand(5)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>






                                    <!-- END:: ENTER BRAND -->
                                    </div>                         
                                 </div>
                                 </div>


                                 <!-- START: IMAGE FOR BRAND DEMO -->
                                  <div class="col-sm-6 ">
                                    <div class="row"> 
                                        <div class="col-12">
                                            <img src="/img/capture-attribute-list.jpg" class="img-fluid filterSample-bx">
                                            <img src="/img/capture-brand-list.jpg" class="img-fluid filterSample-bx"></div>
                                    </div>
                                    </div>
                                 <!-- END  : IMAGE FOR BRAND DEMO -->



                                  <div class="col-sm-6 ">
                                      <div class="row">                                    
                                   

<!-- START:: ENTER FILTERS -->
                                    <div class="col-12 ">
                                        <h4>Filter List</h4>
<!-- Start Looped -->                                    
                                    <div class="produt-list-bx brand-list " v-for="(element, index) in filterslab" :key="index">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filterslab[index]" id="attri-2" required>
                                            <label class="form-label">Enter Filter</label>
                                        </div>
                                        </div>    
                                        <!--<div class="addbtn-brand"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  -->
                                    </div>

<!-- End Looped -->                                    
                                    <div class="produt-list-bx brand-list ">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filters.filter1" id="brand-2" required>
                                            <label class="form-label">Enter Filter</label>
                                        </div>
                                        </div>    
                                        <!--<div class="addbtn-brand" @click="rembrand"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  -->
                                        <div class="addbtn-brand" @click="addfilter"><div class="btn-primary"><i class="fa fa-plus"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="filter2" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filters.filter2" id="brand-2" required>
                                            <label class="form-label">Enter Filter</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="remfilter(2)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="filter3" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filters.filter3" id="brand-2" required>
                                            <label class="form-label">Enter Filter</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="remfilter(3)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="filter4" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filters.filter4" id="brand-2" required>
                                            <label class="form-label">Enter Filter</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="remfilter(4)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <div class="produt-list-bx brand-list " id="filter5" style="display:none;">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filters.filter5" id="brand-2" required>
                                            <label class="form-label">Enter Filter</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand" @click="remfilter(5)"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>

                                    <!-- END:: ENTER BRAND -->                        
                                 </div>
                                 </div>                                                                   
                                 </div>
                                 <!-- START: IMAGE FOR BRAND DEMO 
                                  <div class="col-sm-6 ">
                                    <div class="row"> 
                                        <div class="col-12"><img src="/img/capture-attribute-list.jpg" class="img-fluid filterSample-bx"></div>
                                    </div>
                                    </div>
                                  END  : IMAGE FOR BRAND DEMO -->
                                 </div>
                            </div>
                        <div class="col-sm-12 mb-5">         
                            <div>
                                    <button class="primary"  @click="saveCategories">SAVE</button>
                            </div>
                        </div>  
                        </div>
                        <!-- END:: Add new Sub Category-->


                    </div>
                    <!-- END::: FIRST TAB CONTENT -->
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
            afilterfield:1,
            cat_id: this.$route.query.id,
            catlist_ddl:[],
            catlist:[],
            name:null,
            thumb:null,
            parent:null,
            user:this.$store.state.auth.user,
            catlist_ddl_limit:false,

            filterslab:{},
            brandslab:{},
            raja:{},

            filters:{
                filter1:null,
                filter2:null,
                filter3:null,
                filter4:null,
                filter5:null,
            },
            brands:{
                brand1:null,
                brand2:null,
                brand3:null,
                brand4:null,
                brand5:null,
            }
        }
    },
    mounted(){
        this.loadParentCategories();
        this.loadCategory();
        this.getCategoryFilters();
    },
    methods:{
        rembrand(numb){
            $("#brand"+numb).hide();
            this.bfield-=1;
        },
        addbrand(){
            //alert(this.bfield);
            if(this.bfield<5){
                this.bfield+=1;
                $("#brand"+this.bfield).show();
            }
        },
        remfilter(numb){
            $("#filter"+numb).hide();
            this.afilterfield-=1;
        },
        addfilter(){
            
            if(this.afilterfield<5){
                this.afilterfield+=1;
                $("#filter"+this.afilterfield).show();
            }
        },
        async getCategoryFilters() {

          let cat_result = axios.get("/api/category/pfilters/" + this.cat_id);
          if ((await cat_result).data != null) {
            this.filterslab = (await cat_result).data.data_f;
            this.brandslab = (await cat_result).data.brandslab;
          }
          console.log(this.filterslab);
        },
        changeThumb(e){
            this.thumb= e.target.files[0];
        },
        async loadCategory(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/category/"+this.cat_id);
            console.warn("Check Data");
            const obj = (await result).data;
            if(obj!=null && obj.data!=null){
                this.name=obj.data.title ? obj.data.title : null
                this.parent=obj.data.parent_category_id ? obj.data.parent_category_id : null
            }
            console.log(obj)
            document.getElementById('ajaxLoader').style.display = 'none';
        },
        async loadParentCategories(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/categories");
            console.warn("Check Data");
            const obj = (await result).data;
            console.warn(obj);
            if(obj.success==true){
              this.catlist_ddl = obj.data;
              console.warn((await result).data.length);
              if((await result).data.length<10){
                console.warn("Inside");
                this.catlist_ddl_limit=true
              }
            } else {
              alert("Issue loading categories");
            }
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
            data.append('parent_category_id', this.parent);
            data.append('filters', JSON.stringify(this.filters));
            data.append('filterslab', JSON.stringify(this.filterslab));
            data.append('brands', JSON.stringify(this.brands));
            data.append('brandslab', JSON.stringify(this.brandslab));

            axios.post('/create-category', data, config)
                .then(function (res) {
                    console.log(res);
                    var result = res.data;
                    
                    if (result.success === true) {
                        alert('Category created successfully.');
                        
                        object.$router.push({ path: '/vendor/subcategories' })
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

        }

    }
}
</script>
