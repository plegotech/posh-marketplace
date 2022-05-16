<template>
    <div class="container-fluid pending-vend">       
        <div class="row mt-12">
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT for Categories -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        
                       
                    <!-- START: FIRST TAB CONTENT for SUB Categories -->
                    
                        <div class="row">
                            <div class="col-xl-6 col-12  my-4">
                                <div class="search-box" style="max-width:100%">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input type="text" class="search_BX fetchProductsSearch">
                                    <img src="/img/close-srch.png" class="close-icon" alt="">
                                </div>
                            </div>
                            <div class="col-6 my-4"><div class="btn-right-bx">
<router-link :to="{ path: 'editsubcategories', query: { id: 0 }, props: true }" class="primary">Add New Sub Category</router-link>
</div></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                        <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                            <thead>
                                <tr>
                                <th>ID</th>                                
                                <th>Sub Categories</th>
                                <th>Parent Category</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(order, index) in this.catlist" :key="index">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.title }}</td>
                                    <td>{{ order.parent.title }}</td>
                                    <td>
                                        <div class="dropdown cst-slct">
                                            <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                 data-toggle="dropdown" aria-haspopup="true"
                                                 aria-expanded="false">
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li @click="toggleCategory(order.id)" class="inactive-mob"><a href="#">In-Active</a></li>
                                                <li class="inactive-mob"><router-link :to="{ path: 'editsubcategories', query: { id: order.id }, props: true }" class="edit-mob">Edit</router-link></li>
                                                <li @click="deleteCategory(order.id)" class="inactive-mob"><a href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                             </tbody>
                        </table>
                        </div>
                        </div>
                        <!-- END:: FIRST TAB CONTENT for SUB Categories -->
                       


                            </tbody>
                        </table>
                        <!-- END: TABLE   -->
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
        //this.loadParentCategories();
        //this.loadCategories();
        this.loadSubCategories();
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
        async loadSubCategories(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/subcategories");
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
        toggleCategory(id){
            axios.post('/api/category/update/'+id)
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
