<template>
    <div class="container-fluid pending-vend">
        <div class="row mt-12">
            <div class="col-sm-12 addcat">
                <div class="top-newOrder myorder mb-4">
                    <div class="row mb-4 up-main-bx">
                        <div class="col-sm-4">
                            <div class="up-main-bx-1">
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="name" class="form-control-label" required>
                                    <label class="form-label">Category Name</label>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-4">
                            <div class="up-main-bx-1">
                                <div class="form-outline-ft mb-5">
                                    
                                    <select class="form-control-label select-custom-point" v-model="parent">
                                        <option value="0">No Parent</option>
                                        <option v-for="(category, index) in this.catlist"
                                                :value="index">{{ category.title }}</option>
                                    </select>
                                    <span class="form-label">Category Parent</span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-4">     
                            <div>
                                    <button class="primary" @click="saveCategories">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        
                        <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Categories</th>
                                <th>Sub Categories</th>
                                <th>Created On</th>
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
                                    {{ order.created_at }}
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
</template>

<script>
export default {

    data(){
        return {
            catlist:[],
            name:null,
            parent:null,
            user:this.$store.state.auth.user,
        }
    },
    mounted(){
        this.loadCategories();
    },
    methods:{
        
        async loadCategories(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/categories");
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
            data.append('title', this.name);
            data.append('parent_category_id', this.parent);

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
                });

        }

    }
}
</script>
