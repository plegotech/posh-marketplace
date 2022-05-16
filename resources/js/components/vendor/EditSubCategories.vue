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
                                    <!-- <div class="col-sm-6 mb-3" style="display: none;">
                                        <button class="primary " @click="addbrand"><i class="fa fa-plus"></i> Add Brand</button>
                                    </div>
                                    <div class="col-sm-6"  style="display: none;">
                                        <button class="primary " @click="rembrand"> <i class="fa fa-minus"></i> Remove Brand</button>
                                    </div> -->                                    
                                    <div class="col-sm-12 brand-list" v-for="(element, index) in filterslab" :key="index">         
                                        <input type="text" v-model="filterslab[index]" class="pre_filters" placeholder="Enter Attribute" required>
                                    </div>
                                    
                                    <div class="col-12 mb-5">
                                        <h4>Brand List</h4>
                                        <!-- START:: ENTER BRAND -->
                                    <div class="produt-list-bx brand-list ">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                               <input type="text" class="form-control-label" placeholder="" v-model="filters.filter1" id="brand-1" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand"><div class="btn-primary"><i class="fa fa-plus"></i></div></div>  
                                    </div>
                                    <!-- END:: ENTER BRAND -->
                                    <!-- START:: ENTER BRAND -->
                                    <div class="produt-list-bx brand-list ">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filters.filter1" id="brand-2" required>
                                            <label class="form-label">Enter Brand</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <!-- END:: ENTER BRAND -->
                                    </div>                         
                                 </div>
                                 </div>
                                 <!-- START: IMAGE FOR BRAND DEMO -->
                                  <div class="col-sm-6 ">
                                    <div class="row"> 
                                        <div class="col-12"><img src="/img/capture-brand-list.jpg" class="img-fluid"></div>
                                    </div>
                                    </div>
                                 <!-- END  : IMAGE FOR BRAND DEMO -->
                                  <div class="col-sm-6 ">
                                      <div class="row">                                    
                                    <!-- <div class="col-sm-6 mb-3" style="display:none">
                                        <button class="primary " @click="addbrand"><i class="fa fa-plus"></i> Add Attribute</button>
                                    </div>
                                    <div class="col-sm-6" style="display: none;">
                                        <button class="primary " @click="rembrand"><i class="fa fa-times"></i> Remove Attribute</button>
                                    </div> -->
                                    
                                    <div class="col-sm-12 brand-list" v-for="(element, index) in filterslab" :key="index">         
                                        <input type="text" v-model="filterslab[index]" class="pre_filters" placeholder="Enter Attribute"  required>
                                    </div>
                                    <div class="col-12 ">
                                        <h4>Filter List</h4>
                                    <!-- START:: ENTER BRAND -->
                                    <div class="produt-list-bx brand-list ">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                               <input type="text" class="form-control-label" placeholder="" v-model="filters.filter1" id="attri-1" required>
                                            <label class="form-label">Enter filter</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand"><div class="btn-primary"><i class="fa fa-plus"></i></div></div>  
                                    </div>
                                    <!-- END:: ENTER BRAND -->
                                    <!-- START:: ENTER BRAND -->
                                    <div class="produt-list-bx brand-list ">
                                        <div class="brandlisting-bx mt-3">                                 
                                           <div class="form-outline-ft ">
                                            <input type="text" class="form-control-label" placeholder="" v-model="filters.filter2" id="attri-2" required>
                                            <label class="form-label">Enter filter</label>
                                        </div>
                                        </div>    
                                        <div class="addbtn-brand"><div class="btn-primary btnclose-bt"><i class="fa fa-times"></i></div></div>  
                                    </div>
                                    <!-- END:: ENTER BRAND -->                        
                                 </div>
                                 </div>                                                                   
                                 </div>
                                 <!-- START: IMAGE FOR BRAND DEMO -->
                                  <div class="col-sm-6 ">
                                    <div class="row"> 
                                        <div class="col-12"><img src="/img/capture-attribute-list.jpg" class="img-fluid"></div>
                                    </div>
                                    </div>
                                 <!-- END  : IMAGE FOR BRAND DEMO -->
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
            cat_id: this.$route.query.id,
            catlist_ddl:[],
            catlist:[],
            name:null,
            thumb:null,
            parent:null,
            user:this.$store.state.auth.user,
            catlist_ddl_limit:false,
           filterslab:{},
           raja:{},
            filters:{
                filter1:null,
                filter2:null,
                filter3:null,
                filter4:null,
                filter5:null,
            }
        }
    },
    mounted(){
        this.loadParentCategories();
        this.loadCategory();
        this.getCategoryFilters();
    },
    methods:{
        rembrand(){
            if(this.bfield>1){
                $("#brand-"+this.bfield).hide();
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
            this.filterslab = (await cat_result).data.data_f;
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

            axios.post('/create-category', data, config)
                .then(function (res) {
                    console.log(res);
                    var data = res.data;
                    this.cat_id=0
                    this.name=null
                    this.thumb=null
                    this.parent=null
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
