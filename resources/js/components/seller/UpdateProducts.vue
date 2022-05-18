<template>

    <div class="container-fluid pending-vend seller-vendor-prod">

        <div class="row mt-4">

            <div class="col-sm-12">

                <div class="top-newOrder payment_Hist">
                        
                    <div class="row">
                        <!-- START:: PRODUCT DETAIL -->
                        <div class="col-xl-4 col-lg-6 col-sm-6">
                            <div class="products-listing-bxx">
                                <div class="product-img-bx">
                                    <img id="img-upload-vup" src="https://posh-marketplace.plego.pro/img/product-images/997/8982810G-B68TYL1.png" alt="">
                                </div> 
                                <p class="plx-title lbg-gray">{{ product.name }}</p> 
                                <div class="price-btn-bx" style="display: block;">
                                    <div class="price-title-b">
                                        <!----> 
                                        <h5>Vendor Price: {{ product.net_price }}$</h5>
                                        <input type="text" v-model="product.seller_price" placeholder="Enter Amount" />
                                        <br>
                                         <button @click="updateSellerProduct" class="primary">UPDATE</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!-- END  :: PRODUCT DETAIL -->
                    </div>
                    <div class="row">
                        <div class="col-sm-3 mb-3">
                           
                        </div>
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
            product : {
                product_id:this.$route.params.product_id,
                name:0,
                featured_image:0,
                seller_price:0,
                net_price:0,
                seller_id :0,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                
            },
            user: this.$store.state.auth.user,
        }
    },
    mounted() {
    },
    created() {
        this.product.product_id=this.$route.params.product_id
        this.product.seller_id=this.user.id
        this.loadProduct(this.product.product_id);
    },
    methods: {
        async loadProduct(product){
            document.getElementById('ajaxLoader').style.display = 'block';
            let url = '/api/product/get/' + product;
            fetch(url)
                .then(res => res.json())
                .then(res => {
                    if(res.featured_image) {
                        let src = "/img/product-images/" + res.vendor_id + "/" + res.featured_image;
                        document.getElementById('img-upload-vup').src = src;
                    }
                    this.product.name                   = res.name;
                    this.product.net_price              = res.net_price;
                    this.product.seller_price           = res.seller_price;
                    
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },

        async updateSellerProduct(){
                fetch('/api/seller-update-product', {
                    method: 'post',
                    body: JSON.stringify(this.product),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        alert("Updated Successfully");
                    })
                    .catch(err => console.log(err));

        },
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
    }
}
</script>
