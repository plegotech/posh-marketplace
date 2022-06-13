<template>

    <div class="container-fluid pending-vend">
        <div class="row mt-4">
            <div class="col-sm-12">
                

            <!-- START: SECTION FOR ADMIN -->
            <div class="top-newOrder mb-4">
                <!-- START: VIEW PRODUCT -->
                        <div class="row">
                            <div class="col-12">
                                <div class="details-bx-area">
                                <div class="row">
                                     <div class="col-sm-8">
                                         <div class="vendorBox-left">
                                        <div class="vendor-rod-imag"><img :src="'/img/product-images/'+list.vendor_id+'/'+list.featured_image+''" class="img-x-v-view"></div>
                                        <div class="vendor-detail-bx">
                                            <h5>{{ list.product_name }}</h5>
                                            <div class="ven-q-bx">Quantity Needed: {{ list.quantity }}</div>
                                            <div class="ven-q-bx">Order Date: {{ list.order_date }}</div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="vendor-rod-detail">
                                            <div class="topaid-bx">Total Paid:</div>
                                            <div class="topaid-amout">${{ list.net_price }}</div>
                                            <div class="topaid-amout"><a href="#">Refund</a></div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="details-bx-area">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>User Name</h5>
                                            <p>{{ list.customer_first_name+" "+list.customer_last_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>User Email</h5>
                                            <p>{{ list.customer_email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>User Phone Number</h5>
                                            <p>{{ list.customer_phone }}</p>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Shipping Details</h5>
                                            <p>{{ list.shipping_address }}</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="details-bx-area">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Seller Name</h5>
                                            <p>{{ list.seller_first_name+" "+list.seller_last_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Seller Company</h5>
                                            <p>Lauren Graduation Party</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Seller Phone Number</h5>
                                            <p>{{ list.seller_phone }}</p>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Seller Email Address</h5>
                                            <p>{{ list.seller_email }}</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="details-bx-area">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Vendor Name</h5>
                                            <p>{{ list.vendor_first_name+" "+list.vendor_last_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Vendor Company</h5>
                                            <p>Lauren Graduation Party</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Vendor Phone Number</h5>
                                            <p>{{ list.vendor_phone }}</p>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="box-vender-view">
                                            <h5>Vendor Email Address</h5>
                                            <p>{{ list.vendor_email }}</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="details-bx-area">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="box-vender-view">
                                        <h5>Description of Product</h5>
                                        <p>{{ list.description }}</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: VIEW PRODUCT -->
            </div>
            <!-- END::: SECTION FOR ADMIN -->
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            user: this.$store.state.auth.user,
            list:[],
            order_id:this.$route.params.id
        }
    }, 
    mounted(){
        //alert(this.order_id)
        this.getData()
    },
    methods:{
        async getData(){
            var url = "/api/orders/viewAdminOrder/"+this.order_id

            let result = axios.get(url);
            this.list = (await result).data;
        }
    }
}
</script>
