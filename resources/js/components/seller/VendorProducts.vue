<template>

    <div class="container-fluid pending-vend seller-vendor-prod">

        <div class="row mt-4" >

            <div class="col-sm-12">

                <div class="top-newOrder payment_Hist">

                    <div class="row">
                        <div class="col-sm-3 mb-4">
                            <select class="parentCategory select-custom-point" @change="updateSubCategories()">
                                <option value="" selected>Category</option>
                                <option v-for="(category, index) in parent_categories"
                                        :value="index">
                                    {{ index }}
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-3 mb-4">
                            <select class="subCategory select-custom-point" @change="fetchAllProducts()">
                                <option value="" selected>Sub Category</option>
                                <option v-for="(category, index) in sub_categories"
                                        :value="category">
                                    {{ category }}
                                </option>
                            </select>
                        </div>
                        <div class="search-box mb-4 col-sm-3 offset-sm-3">

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
                    <table class="table vendorProduct">
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
                                    <i class="fa fa-check-double" @click="toggleSellerProduct(product.id)"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <div v-if="all_total > 0" class="row">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <div aria-label="Page navigation example">
                                <ul class="pagination bottm-pagination">
                                    <li v-if="all_current_page > 4" @click="fetchAllProducts(all_current_page - 4)" class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li v-if="all_current_page > 3" @click="fetchAllProducts(all_current_page - 3)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ all_current_page - 3 }}</a></li>
                                    <li v-if="all_current_page > 2" @click="fetchAllProducts(all_current_page - 2)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ all_current_page - 2 }}</a></li>
                                    <li v-if="all_current_page > 1" @click="fetchAllProducts(all_current_page - 1)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ all_current_page - 1 }}</a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)"> {{ all_current_page }} </a></li>
                                    <li v-if="all_last_page > (all_current_page)" @click="fetchAllProducts(all_current_page + 1)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ all_current_page + 1 }}</a></li>
                                    <li v-if="all_last_page > (all_current_page + 1)" @click="fetchAllProducts(all_current_page + 2)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ all_current_page + 2 }}</a></li>
                                    <li v-if="all_last_page > (all_current_page + 2)" @click="fetchAllProducts(all_current_page + 3)" class="page-item"><a class="page-link" href="javascript:void(0)">{{ all_current_page + 3 }}</a></li>
                                    <li v-if="all_last_page > (all_current_page + 3)" @click="fetchAllProducts(all_current_page + 4)" class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"> &raquo; </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="my-product">
                        <h2>My Products <span>({{ total }} of {{ max_product }} chosen)</span></h2>
                    </div>
                    <table class="table vendorProduct">
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
                product_id:     0,
                seller_id:      0,
                _token:         document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created() {
        this.fetchAllProducts();
        this.parent_categories = SITE_CATEGORIES;
        this.product_check.seller_id = this.user.id;
        this.fetchWebsite();
        this.fetchProducts();
    },
    methods: {

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

            if(typeof parent[0] !== 'undefined') {
                parent = parent[0].value;
                this.sub_categories = SITE_CATEGORIES[parent];
            }
            this.fetchAllProducts();
        },

        fetchWebsite() {
            document.getElementById('ajaxLoader').style.display = 'block';

            var url = '/api/website/' + this.user.id;

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.max_product    =   SELLER_TIERS[res.tier];
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
                    this.products       = res.data;
                    this.total          = res.total;
                    var productsData = this.products;
                    productsData.forEach(function (product) {
                        document.getElementById('allProduct'+product.id).style.display = 'none';
                    });
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },

        fetchAllProducts(page = 0, search = 0) {
            document.getElementById('ajaxLoader').style.display = 'block';

            var sort_by         = document.getElementsByClassName('sort_by');
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

            if (parent.length > 1) {
                url += '/' + parent;
            }

            if (sub_category.length > 1) {
                url += '/' + sub_category;
            }

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.all_products       = res.data;
                    this.all_to             = res.to;
                    this.all_from           = res.from;
                    this.all_last_page      = res.last_page;
                    this.all_total          = res.total;
                    this.all_current_page   = res.current_page;
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
