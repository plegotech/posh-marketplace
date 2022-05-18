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
                                    <img src="https://posh-marketplace.plego.pro/img/product-images/997/8982810G-B68TYL1.png" alt="">
                                </div> 
                                <p class="plx-title lbg-gray">alien 2</p> 
                                <div class="price-btn-bx" style="display: block;">
                                    <div class="price-title-b">
                                        <!----> 
                                        <h5>Vendor Price: 200$</h5>
                                        <input type="text" v-model="product_check.net_price" placeholder="Enter Amount" />
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
product_check : {
                product_id:this.$route.params.product_id,
                net_price:0,
                seller_id :0,
_token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                
},user: this.$store.state.auth.user,
        }
    },
    mounted() {
    },
    created() {
        this.product_check.product_id=this.$route.params.product_id
        this.product_check.seller_id=this.user.id
    },
    methods: {

        async updateSellerProduct(){
                fetch('/api/seller-update-product', {
                    method: 'post',
                    body: JSON.stringify(this.product_check),
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
