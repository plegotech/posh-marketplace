<template>


    <div class="container-fluid pending-vend">
        <div class="row mt-4" >
            <div class="col-sm-12">
                <div class="top-newOrder myorder">
                    <div class="row">
                        <div class="col-xl-4 col-12  mb-4">
                            <div class="search-box" style="max-width:100%">
                                <img src="/img/search-icon.png" class="search-icon" alt="">
                                <input type="text" class="search_BX fetchProductsSearch" v-on:keypress="fetchProductsSearch">
                                <img src="/img/close-srch.png" @click="fetchProductsSearchClear" class="close-icon" alt="">
                            </div>
                        </div>
                        <div class="col-xl-8 col-12">
                            <div class="row justify-content-md-end">
                                <div class="col-lg-3 col-xl-auto col-6 mb-4">
                                    <select class="sort_by select-custom-point" @change="fetchProducts()">
                                        <option value="" selected>Sort By</option>
                                        <option value="name">Name</option>
                                        <option value="net_price">Price</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-xl-auto col-6 mb-4">
                                    <select class="parentCategory select-custom-point" @change="updateSubCategories()">
                                        <option value="" selected>Category</option>
                                        <option v-for="(category, index) in parent_categories"
                                        :value="index">
                                            {{ index }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-xl-auto col-6 mb-4">
                                    <select class="subCategory select-custom-point" @change="fetchProducts()">
                                        <option value="" selected>Sub Category</option>
                                        <option v-for="(category, index) in sub_categories"
                                        :value="category">
                                            {{ category }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-xl-auto col-6 mb-4">
                                    <select class="status select-custom-point" @change="fetchProducts()">
                                        <option value="" selected>All</option>
                                        <option value="active">Active</option>
                                        <option value="archived">Archived</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="user.user_type == 'vendor'" class="row justify-content-md-end">
                        <div class="w-auto mb-4  ">
                            <button class="primary btn-box-shadow"><i
                                class="fas fa-cloud-upload-alt mr-2"></i><strong>
                                <router-link :to="{ name: 'vendor-upload-products'}">
                                UPLOAD
                                </router-link>
                            </strong></button>
                        </div>
                    </div>
                    <!-- START:: Products listing -->
                    <div v-if="total > 0" class="row">
                        <div v-for="product in products" class="col-xl-4 col-lg-6 col-sm-6">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img :src="'/img/product-images/'+ product.vendor_id + '/' + product.featured_image" alt="" class="">
                                </div>
                                <p class="plx-title">{{ product.name }}</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> {{ product.net_price }}</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-green">
                                            <router-link :to="{ name: 'vendor-upload-products', params: { product_id: product.id }}">
                                                EDIT
                                            </router-link>
                                        </div>
                                        <div @click="deleteProduct(product.id)" class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END  :: Products listing -->
                    <div v-if="total > 0" class="row">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <div aria-label="Page navigation example">
                                <ul class="pagination bottm-pagination">
                                    <li v-if="current_page > 4" @click="fetchProducts(current_page - 4)" class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li v-if="current_page > 3" @click="fetchProducts(current_page - 3)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ current_page - 3 }}</a></li>
                                    <li v-if="current_page > 2" @click="fetchProducts(current_page - 2)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ current_page - 2 }}</a></li>
                                    <li v-if="current_page > 1" @click="fetchProducts(current_page - 1)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ current_page - 1 }}</a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)"> {{ current_page }} </a></li>
                                    <li v-if="last_page > (current_page)" @click="fetchProducts(current_page + 1)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ current_page + 1 }}</a></li>
                                    <li v-if="last_page > (current_page + 1)" @click="fetchProducts(current_page + 2)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ current_page + 2 }}</a></li>
                                    <li v-if="last_page > (current_page + 2)" @click="fetchProducts(current_page + 3)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ current_page + 3 }}</a></li>
                                    <li v-if="last_page > (current_page + 3)" @click="fetchProducts(current_page + 4)" class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"> &raquo; </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div v-if="total < 1">
                        <p>No records found</p>
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
                search: 0,
                total: 0,
                current_page: 0,
                from: 0,
                to: 0,
                last_page: 0,
                user: this.$store.state.auth.user,
                products: [],
                product: {
                    id: null,
                    name: null,
                    net_price: null,
                    sale_price: null,
                    featured_image: null
                }
            }
        },

        created() {
            this.fetchProducts();
            this.parent_categories = SITE_CATEGORIES;
        },

        methods: {
            updateSubCategories() {
                var parent = document.getElementsByClassName('parentCategory');

                if(typeof parent[0] !== 'undefined') {
                    parent = parent[0].value;
                    this.sub_categories = SITE_CATEGORIES[parent];
                }
                this.fetchProducts();
            },
            fetchProducts(page = 0, search = 0) {
                document.getElementById('ajaxLoader').style.display = 'block';

                var sort_by         = document.getElementsByClassName('sort_by');
                var status          = document.getElementsByClassName('status');
                var parent          = document.getElementsByClassName('parentCategory');
                var sub_category    = document.getElementsByClassName('subCategory');

                if(typeof parent[0] !== 'undefined') {
                    parent = parent[0].value;
                }

                if(typeof sub_category[0] !== 'undefined') {
                    sub_category = sub_category[0].value;
                }

                var order_by = 0;
                if(typeof sort_by[0] !== 'undefined') {
                    order_by = sort_by[0].value;
                }

                if(typeof status[0] !== 'undefined') {
                    status = status[0].value;
                }

                var url = '/api/products/' + this.user.id;

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

                if (status.length != 0) {
                    url += '/' + status;
                } else {
                    url += '/0';
                }

                if (parent.length > 1) {
                    url += '/' + parent;
                } else {
                    url += '/0';
                }

                if (sub_category.length > 1) {
                    url += '/' + sub_category;
                } else {
                    url += '/0';
                }

                if (page > 0) {
                    url += '?page=' + page;
                }

                fetch(url)
                    .then(res => res.json())
                    .then(res => {
                        this.products       = res.data;
                        this.to             = res.to;
                        this.from           = res.from;
                        this.last_page      = res.last_page;
                        this.total          = res.total;
                        this.current_page   = res.current_page;
                    })
                    .catch(err => console.log(err))
                    .finally(() => {
                        document.getElementById('ajaxLoader').style.display = 'none';
                    });
            },

            deleteProduct(product) {
                if(confirm('This product will be removed from your catlog, are you sure?')) {

                    var url = '/api/product/remove/' + product;

                    fetch(url)
                        .then(res => res.json())
                        .then(res => {
                            this.fetchProducts();
                        })
                        .catch(err => console.log(err))
                        .finally(() => {

                        });
                }
            },

            fetchProductsSearchClear: function () {
                document.getElementsByClassName('fetchProductsSearch')[0].value = '';
                this.search = 0;
                this.fetchProducts(0,0);
            },

            fetchProductsSearch: function (e) {
                if (e.keyCode === 13) {
                    var element = e.target;
                    this.fetchProducts(0, element.value);
                }
            },
        }

    }
</script>
