<template>
    <div class="container-fluid pending-vend">       
        <div class="row mt-12">
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT for Categories -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        
                        <!-- START:: Add new Sub Category-->
                        <div class="row">
                            <div class="col-lg-6  col-6 mb-4">
                                <div class="form-outline-ft">
                                    <select class="form-control-label select-custom-point" name="" id="">
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
                                            <input type="hidden" v-model="cat_id" />
                                            <label class="form-label">Enter sub Category Name</label>
                                        </div>                                  
                                 </div>
                                 <div class="col-sm-6">                                   
                                        <div class="form-outline-ft mb-5">
                                            <input type="text" v-model="name" class="form-control-label" required>
                                            <input type="hidden" v-model="cat_id" />
                                            <label class="form-label">Enter Brand</label>
                                        </div>                               
                                 </div>
                                 <div class="col-sm-6">                                    
                                        <div class="form-outline-ft mb-5">
                                            <input type="text" v-model="name" class="form-control-label" required>
                                            <input type="hidden" v-model="cat_id" />
                                            <label class="form-label">Enter Attribute</label>
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
    </div>
</template>

<script>
export default {

    data(){
        return {
            cat_id:0,
            catlist_ddl:[],
            catlist:[],
            name:null,
            thumb:null,
            parent:null,
            user:this.$store.state.auth.user,
            catlist_ddl_limit:false
        }
    },
    mounted(){
        this.loadParentCategories();
        this.loadCategories();
        
    },
    methods:{
        changeThumb(e){
            this.thumb= e.target.files[0];
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
        async loadCategories(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/categoriesall");
            console.warn("Check Data");
            const obj = (await result).data;
            console.warn(obj);
            if(obj.success==true){
              this.catlist = obj.data;
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
