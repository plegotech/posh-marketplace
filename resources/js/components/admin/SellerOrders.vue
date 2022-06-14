<template>

    <div class="container-fluid pending-vend">
        <!-- start modal -->
        <div class="modal fade bd-example-modal-lg cstm-modal" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-4">
                    <img src="/img/cancel-icon.png" class="cancel-popup" alt="">
                    <img src="'/img/vendor-logos/'+ company.logo" style="max-width: 150px; height: auto"
                         alt="">

                    <form ref="form">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                   <div class="form-group">
                                    <label>Order Id :</label>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                    <label>528</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Product Name :</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                    <label>Dell Laptop</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Date :</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                    <label>May 12, 2022 </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Quantity :	</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                    <label>2</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Pricing :	</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                     <label>$500</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Delivery Status :</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                    <label>Received</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Payment :</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                    <label>Credit Card</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Shipping Address :	</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group text-l-label">
                                    <label>4949 Forest Ave, First FL Downers Grove, Illinois</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- start modal -->
        <div class="row" style="margin-top:20px">

            <div class="col-sm-12">

                <div class="top-newOrder myorder">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <div class="search-box" style="max-width:100%">
                                <form action="">
                                    <img  src="/img/search-icon.png" class="search-icon" alt="">
                                    <input style="float:left" type="text" class="search_BX"
                                           v-on:keypress="searchObjects">
                                    <img src="/img/close-srch.png" @click="removeSearch" class="close-icon"
                                         alt="">
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row justify-content-end">
                                <div class="w-auto col-4">
                                    <select v-model="user_type" class="usertype select-custom-point"
                                            @change="fetch()">
                                        <option value="vendor" selected>Vendor</option>
                                        <option value="seller" >Seller</option>
                                    </select>
                                </div>
                                <div class="w-auto col-4">
                                    <select v-model="category" class="parentCategory select-custom-point"
                                            @change="updateSubCategories()">
                                        <option value="0" selected>Category</option>
                                        <option v-for="(category, index) in parent_categories"
                                                :value="category.id">
                                            {{ category.title }}
                                        </option>
                                    </select>
                                </div>
                                <div class="w-auto col-4">
                                    <select v-model="sub_category" class="subCategory select-custom-point"
                                            @change="fetch()">
                                        <option value="0" selected>Sub Category</option>
                                        <option v-for="(category, index) in sub_categories"
                                                :value="category.id">
                                            {{ category.title }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="pendingvendor-sign">
                        <table class="table recent-Orders-table mobile-btn-show" id="sellerOrders_Admin">
                            <thead>
                            <tr>
                                <th class="shuffle-bx" scope="col"><span class="sort-ad">Order Id 
                                <img class="shuffle" src="/img/shuffle.png">
                                    </span>
                                </th>
                                <th class="shuffle-bx" scope="col"><span class="sort-ad">Product Name <img
                                    class="shuffle" src="/img/shuffle.png"></span></th>
                                <th scope="col">Date</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Pricing</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Shipping Address</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="order in orders">
                                <td>
                <img 
                  :src="getImgUrl(order.vendor_id, order.featured_image)"
                  @error="
                    $event.target.src =
                      '/img/product-images/997/no_image.png'
                  "
                />

                                    <span>{{ order.order_id }}</span>
                                    <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <span>{{ order.product_name }}</span>
                                </td>
                                <td>
                                    <span>{{ order.order_date }}</span>
                                </td>
                                <td>
                                    <span>{{ order.quantity }}</span>
                                </td>
                                <td>
                                    <span>${{ order.net_price }}</span>
                                </td>
                                <td>
                                    <span class="shipped">{{ order.progress }}</span>
                                </td>
                                <td>
                                    <span>Credit Card</span>
                                </td>
                                <td>
                                    <span>{{ order.shipping_address }}</span>
                                </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                        <img src="/img/more.png" alt="" class="dropdown-toggle"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                            <li class="view-mob">
                                                <router-link :to="{ name: 'admin-vieworder', params: { id: order.order_id }}" class="box-selection" >View</router-link>
                                            </li>
                                            <!--<li class="view-mob" data-toggle="modal" data-target=".bd-example-modal-lg">View</li>
                                            <li class="edit-mob">Edit</li>
                                            <li class="inactive-mob">Delete</li>-->
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="foot-table">
                        <div class="left">
                                    <span>Rows Per Page:
                                        <select
                                            @change="fetch(current_page, $event.target.value)">
                                            <option value="25" selected>25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                    </span>
                        </div>
                        <div class="right">
                            <span>{{ from }}-{{ to }} of {{ total }} Items</span>
                            <img
                                src="/img/prev-arrow.png" @click="fetch(current_page-1)"
                                alt="" class="prev-itm">
                            <img
                                src="/img/next-arrow.png" @click="fetch(current_page+1)"
                                alt="" class="next-itm"></div>
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
            parent_categories: null,
            sub_categories: null,
            user_type: null,


            orders: [],
            search: 0,
            category: 0,
            sub_category: 0,
            per_page: 0,
            order: 'asc',
            order_by: 0,
            to: 0,
            from: 0,
            total: 0,
            current_page: 0,
            img_url: "/img/product-images/",
        }
    },
    created() {
        this.loadCategories()
        
        this.fetch();
    },
    methods: {
        usertype(){
        },

        async loadCategories(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/categories");
            console.warn("Check Data");
            const obj = (await result).data;
            console.warn(obj);
            if(obj.success==true){
              this.parent_categories = obj.data;
            } else {
              alert("Issue loading categories");
            }
            document.getElementById('ajaxLoader').style.display = 'none';
        },
        updateSubCategories() {
            var parent = document.getElementsByClassName('parentCategory');

            if (typeof parent[0] !== 'undefined') {
                parent = parent[0].value;
                if(parent.length < 1) {
                    document.getElementsByClassName('subCategory')[0].value = ""
                }
                
                this.sub_categories = SITE_CATEGORIES[parent];
                this.loadSubCategories(parent);
            }
            this.fetchAllProducts();
        },
        async loadSubCategories(id){
//alert(id)
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get("/categories", 
                    {
                      params: {
                        id: id
                      },
                    },
                    { useCredentails: true }
            );
            console.warn("Check Data");
            const obj = (await result).data;
            console.warn(obj);
            if(obj.success==true){
              this.sub_categories = obj.data;
            } else {
              alert("Issue loading categories");
            }
            document.getElementById('ajaxLoader').style.display = 'none';
        },

        searchObjects: function (e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                var element = e.target;
                if (element.value.length) {
                    this.fetch(0, 0, element.value);
                } else {
                    this.search = 0;
                    this.fetch();
                }

            }
        },

        removeSearch: function () {
            document.getElementsByClassName('search_BX')[0].value = '';
            this.search = 0;
            this.fetch();
        },
        fetch(page = 0, per_page = 0, search = 0, category = 0, sub_category = 0, user_type=0) {
            document.getElementById('ajaxLoader').style.display = 'block';
            let url = '/api/orders';

            if (per_page > 0 || this.per_page > 0) {
                if (per_page > 0) {
                    this.per_page = per_page;
                }
                url += '/' + this.per_page;
            } else {
                url += '/25';
            }

            var search = search;

            if (search != 0 || this.search != 0) {
                if (search != 0) {
                    this.search = search;
                }
                url += '/' + this.search;
            } else {
                url += '/0';
            }

            var category = category;

            if (category != 0 || this.category != 0) {
                if (category != 0) {
                    this.category = category;
                }
                url += '/' + this.category;
            } else {
                url += '/0';
            }

            var sub_category = sub_category;

            if (sub_category != 0 || this.sub_category != 0) {
                if (sub_category != 0) {
                    this.sub_category = sub_category;
                }
                url += '/' + this.sub_category;
            } else {
                url += '/0';
            }

            var user_type = user_type;

            if (user_type != 0 || this.user_type != 0) {
                if (user_type != 0) {
                    this.user_type = user_type;
                }
                url += '/' + this.user_type;
            } else {
                url += '/0';
            }

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.orders = res.data;
                    this.to = res.to;
                    this.from = res.from;
                    this.total = res.total;
                    if (res.total < res.per_page) {
                        this.from = 0;
                    }
                    this.current_page = res.current_page;
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        getImgUrl(vendor, pet) {
            return this.img_url + "/" + vendor + "/" + pet;
        },
    }
}
</script>
