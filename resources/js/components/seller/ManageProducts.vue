<template>
    <div class="container-fluid pending-vend">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <div v-if="total > 0" class="top-newOrder myorder">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <div class="search-box" style="max-width:100%">
                                <img src="/img/search-icon.png" class="search-icon" alt="">
                                <input type="text" class="search_BX fetchProductsSearch" v-on:keypress="fetchProductsSearch">
                                <img src="/img/close-srch.png" @click="fetchProductsSearchClear" class="close-icon" alt="">
                            </div>
                        </div>
                        <div class="col-sm-6 offset-sm-2">
                            <div class="row">
                                <div class="col">
                                    <select>
                                        <option value="" selected>Sort By</option>
                                        <option value="">Name</option>
                                        <option value="">Number</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select>
                                        <option value="" selected>Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select>
                                        <option value="" selected>Sub Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select>
                                        <option value="" selected>All</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- START:: Products listing -->
                    <div class="row">
                        <div v-for="product in products" class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img :src="'/img/product-images/'+ product.featured_image" alt="" class="">
                                </div>
                                <p class="plx-title">{{ product.name }}</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> {{ product.net_price }}</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green">EDIT</div>
                                        <div @click="deleteProduct(product.id)" class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END  :: Products listing -->
                    <div class="row">
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
                </div>
                <div v-if="total < 1">
                    <p>No records found</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        data() {
            return {
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
        },

        methods: {
            fetchProducts(page = 0, order_by = 0, search = 0) {
                document.getElementById('ajaxLoader').style.display = 'block';
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
                this.fetchProducts(0, 0, 0);
            },

            fetchProductsSearch: function (e) {
                if (e.keyCode === 13) {
                    var element = e.target;
                    this.fetchProducts(0, 0, element.value);
                }
            },
        }

    }
</script>
