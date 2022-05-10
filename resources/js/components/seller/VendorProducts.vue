<template>

    <div class="container-fluid pending-vend seller-vendor-prod">

        <div class="row mt-4">

            <div class="col-sm-12">

                <div class="top-newOrder payment_Hist">

                    <div class="row">
                        <div class="col-sm-3 mb-3">
                            <select class="parentCategory select-custom-point" @change="updateSubCategories()">
                                <option value="" selected>Category</option>
                                <option v-for="(category, index) in this.catlist"
                                        :value="category.id">
                                    {{ category.title }}
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <select class="subCategory select-custom-point" @change="loadBrands()">
                                <option value="" selected>Sub Category</option>
                                <option v-for="(category, index) in this.subcatlist"
                                        :value="category.id">
                                    {{ category.title }}
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <select class="brand select-custom-point" @change="fetchAllProducts()">
                                <option value="" selected>Brands</option>
                                <option v-for="(category, index) in this.brands"
                                        :value="category">
                                    {{ category }}
                                </option>
                            </select>
                        </div>
                        <div class="search-box mb-3 col-sm-3">

                            <img src="/img/search-icon.png" class="search-icon" alt="">
                            <input style="float:left" type="text" class="search_BX"
                                   v-on:keypress="searchObjects"
                                   data-type="pending">
                            <img src="/img/close-srch.png" @click="removeSearch" class="close-icon"
                                 alt="">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="mini-head">Results</p>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="table recent-Orders-table mobile-btn-show vendorProduct" id="sellerVendor_Prod1">
                            <thead>
                            <tr>
                                <th scope="col">Product Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in all_products"
                                :id="'allProduct'+product.id">
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>{{ product.id }}</span>
                                    <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <span>{{ product.name }}</span>
                                </td>
                                <td>
                                        <span>
                                            ${{ product.net_price }}
                                        </span>
                                </td>
                                <td class="center">
                                    <label class="cstm-chkb">
                                        <input type="checkbox" @click="toggleSellerProduct(product.id)"
                                               checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr v-if="all_total < 1">
                                <td>No products available.</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="foot-table" v-if="total > 0">
                            <div class="left"><span>Rows Per Page:
                                                <select
                                                    @change="fetch(current_page, $event.target.value)">
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="75">75</option>
                                                    <option value="100">100</option>
                                                </select>
                                                </span></div>
                            <div v-if="all_total > 0" class="right">
                                <span>{{ all_from }}-{{ all_to }} of {{ all_total }} Items</span>
                                <img v-if="all_from > 1"
                                     src="/img/prev-arrow.png" @click="fetch(current_page-1)"
                                     alt="" class="prev-itm">
                                <img v-if="all_total > all_from"
                                     src="/img/next-arrow.png" @click="fetch(current_page+1)"
                                     alt="" class="next-itm"></div>
                        </div>
                    </div>
                    <div class="my-product">
                        <h2>My Products <span>({{ total }} of {{ max_product }} chosen)</span></h2>
                    </div>
                    <table class="table recent-Orders-table mobile-btn-show vendorProduct" id="sellerVendor_Prod2">
                        <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in products">
                            <td>
                                <img src="/img/nike-shoe1.png" alt="">
                                <span>{{ product.id }}</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>{{ product.name }}</span>
                            </td>
                            <td>
                                    <span>
                                        ${{ product.net_price }}
                                    </span>
                            </td>
                            <td>
                                <i class="fa fa-trash " @click="toggleSellerProduct(product.id)"></i>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            product_check: {
                product_id: 0,
                seller_id: 0,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            all_products: [],
            all_from: null,
            all_last_page: null,
            all_total: null,
            all_current_page: null,
            all_to: null,
            parent_categories: null,
            sub_categories: null,
            search: 0,
            total: 0,
            website: null,
            max_product: 0,
            products: [],
            user: this.$store.state.auth.user,
            catlist:[],
            subcatlist:[],
            brands:[],
        }
    },
    mounted() {
        console.log('Component mounted.')
        this.loadCategories()
    },
    created() {
        this.fetchAllProducts();
        this.parent_categories = SITE_CATEGORIES;
        this.product_check.seller_id = this.user.id;
        this.fetchWebsite();
        this.fetchProducts();
    },
    methods: {

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
              this.subcatlist = obj.data;
            } else {
              alert("Issue loading categories");
            }
            document.getElementById('ajaxLoader').style.display = 'none';
        },
        async loadBrands(){


            var parent = document.getElementsByClassName('subCategory');

            if (typeof parent[0] !== 'undefined') {
                parent = parent[0].value;
                if(parent.length < 1) {
                    document.getElementsByClassName('subCategory')[0].value = ""
                }
                
                document.getElementById('ajaxLoader').style.display = 'block';
                let result = axios.get("/brands", 
                        {
                          params: {
                            sub_category: parent
                          },
                        },
                        { useCredentails: true }
                );
                console.warn("Check Data");
                const obj = (await result).data;
                console.warn(obj);
                if(obj.success==true){
                  this.brands = obj.data;
                } else {
                  alert("Issue loading categories");
                }
                document.getElementById('ajaxLoader').style.display = 'none';
            }
            //this.fetchAllProducts();
        },
        toggleSellerProduct(product) {
            this.product_check.product_id = product;
            fetch('/api/seller-product', {
                method: 'post',
                body: JSON.stringify(this.product_check),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    this.fetchProducts();
                })
                .catch(err => console.log(err));
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

        fetchWebsite() {
            document.getElementById('ajaxLoader').style.display = 'block';

            var url = '/api/website/' + this.user.id;

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.max_product = SELLER_TIERS[res.tier];
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },

        fetchProducts(page = 0, search = 0) {
            document.getElementById('ajaxLoader').style.display = 'block';

            var url = '/api/products/' + this.user.id;

            url += '/id';
            url += '/desc';

            var search = search;

            if (search != 0 || this.search != 0) {
                if (search != 0) {
                    this.search = search;
                }
                url += '/' + this.search;
            } else {
                url += '/0';
            }

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.products = res.data;
                    this.total = res.total;
                    var productsData = this.products;
                    productsData.forEach(function (product) {
                        document.getElementById('allProduct' + product.id).style.display = 'none';
                    });
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },

        fetchAllProducts(page = 0, search = 0) {
            document.getElementById('ajaxLoader').style.display = 'block';

            var sort_by             = document.getElementsByClassName('sort_by');
            var parent              = document.getElementsByClassName('parentCategory');
            var sub_category        = document.getElementsByClassName('subCategory');
            var brand               = document.getElementsByClassName('brand');

            if (typeof parent[0] !== 'undefined') {
                parent = parent[0].value;
            }

            if (typeof sub_category[0] !== 'undefined') {
                sub_category = sub_category[0].value;
            }
            if (typeof brand[0] !== 'undefined') {
                brand = brand[0].value;
            }

            var order_by = 0;
            if (typeof sort_by[0] !== 'undefined') {
                order_by = sort_by[0].value;
            }

            var url = '/api/products/0';

            if (order_by != 0 || this.order_by > 0) {
                if (order_by != 0) {
                    this.order_by = order_by;
                    if (this.order == 'asc') {
                        this.order = 'desc';
                    } else {
                        this.order = 'asc';
                    }
                }
                url += '/' + this.order_by;
                url += '/' + this.order;
            } else {
                url += '/id';
                url += '/desc';
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

            url += '/0';

            if (parent.length >= 1) {
                url += '/' + parent;
            }

            if (sub_category.length >= 1) {
                url += '/' + sub_category;
            }
            if (brand.length >= 1) {
                url += '/' + brand;
            }

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.all_products = res.data;
                    this.all_to = res.to;
                    this.all_from = res.from;
                    this.all_last_page = res.last_page;
                    this.all_total = res.total;
                    this.all_current_page = res.current_page;
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },

        searchObjects: function (e) {
            if (e.keyCode === 13) {
                var element = e.target;
                this.fetchAllProducts(0, element.value);
            }
        },

        removeSearch: function () {
            document.getElementsByClassName('search_BX')[0].value = '';
            this.search = 0;
            this.fetchAllProducts();
        },
    }
}
</script>
