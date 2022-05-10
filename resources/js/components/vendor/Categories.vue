<template>
    <div class="container-fluid pending-vend">       
        <div class="row mt-12">
            <div class="col-sm-12 addcat">
                <div class="top-newOrder myorder mb-4">
                    <div class="row mb-4 up-main-bx">
                        <div class="col-sm-3">
                            <div class="up-main-bx-1">
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="name" class="form-control-label" required>
                                    <input type="hidden" v-model="cat_id" />
                                    <label class="form-label">Category Name</label>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-3">
                            <div class="up-main-bx-1">
                                <div class="form-outline-ft mb-5">
                                    
                                    <select class="form-control-label select-custom-point" v-model="parent">
                                        <option value="0">No Parent</option>
                                        <option v-for="(category, index) in this.catlist_ddl"
                                                :value="category.id">{{ category.title }}</option>
                                    </select>
                                    <span class="form-label">Category Parent</span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-3">
                            <div class="up-main-bx-1">
                                <div class="form-outline-ft mb-5">
                                    <input type="file" ref="file" style="display: none" name="thumb" @change="changeThumb" />
                                    <button class="img-title-up form-control-label" @click="$refs.file.click()">Upload Image</button>
                                    <span class="form-label">Thumbnail</span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-3">     
                            <div>
                                    <button class="primary"  @click="saveCategories">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT for Categories -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        <div class="row">
                            <div class="col-xl-6 col-12  mb-4">
                                <div class="search-box" style="max-width:100%">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input type="text" class="search_BX fetchProductsSearch">
                                    <img src="/img/close-srch.png" class="close-icon" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                        <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                            <thead>
                                <tr>
                                <th>ID</th>                                
                                <th>Categories</th>
                                <th>No. of Sub Categories</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Computer Systems</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td> Gaming</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 3 </td>
                                <td> Networking</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 4 </td>
                                <td> Office Solutions</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 5 </td>
                                <td> Software Services</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 6 </td>
                                <td> Home & Tools</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 7 </td>
                                <td> Electronics</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 8 </td>
                                <td> Components</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 9 </td>
                                <td> Automotives</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 10 </td>
                                <td> Health & Sports</td>
                                <td> 4 </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                             </tbody>
                        </table>
                        </div>
                        </div>
                        <!-- END:: FIRST TAB CONTENT for Categories -->
                        <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                            <thead>
                                <tr>
                                <th>ID</th>                                
                                <th>Categories</th>
                                <th>Sub Categories</th>
                                <th>Type</th>
                                <th>Created On</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(order, index) in this.catlist" :key="index">
                                <td>
                                    {{ order.id }}
                                </td>
                                
                                <td>
                                    {{ order.title }}
                                </td>
                                <td>
                                    <ul>
                                            <li v-for="sub in order.children">{{sub.title}}</li>
                                    </ul>
                                    
                                    
                                </td>
                                <td>
                                    {{ order.parent_category_id ? "-" : "MAIN"}}
                                </td>
                                <td>
                                    {{ order.created_at }}
                                </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li @click="updateCategory(order)" class="edit-mob">Edit</li>
                                            <li @click="deleteCategory(order.id)" class="inactive-mob">Delete</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
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
                    this.cat_id=0;
                    this.name=null;
            axios.post('/create-category', data, config)
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
