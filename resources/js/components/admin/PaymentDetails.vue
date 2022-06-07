<template>

    <div class="container-fluid pending-vend">

        <div class="row" style="margin-top:20px">

            <div class="col-sm-12">

                <div class="top-newOrder">
                    <table class="table recent-Orders-table mobile-btn-show" id="PaymentDetail_Admin">
                        <thead>
                        <tr>
                            <th class="shuffle-bx" scope="col"><span class="sort-ad">Transaction Id<img class="shuffle" src="/img/shuffle.png"></span></th>
                            <th class="shuffle-bx" scope="col"><span class="sort-ad">Amount<img class="shuffle" src="/img/shuffle.png"></span></th>
                            <th class="shuffle-bx" scope="col"><span class="sort-ad">Address <img class="shuffle" src="/img/shuffle.png"></span></th>
                            
                            <th scope="col">Currency</th>
                            <th scope="col">Source Type</th>
                            <th scope="col">Seller Name</th>
                            <th scope="col">Vendor Name</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(items, key) in paydetails" >
                                <td>{{ items.id }}</td>
                                <td>
                                    <span>${{ items.seller_price }}</span>
                                </td>
                                <td>
                                    <span>{{items.shipping_address}}</span>
                                </td>
                                <td>
                                    <span>{{ items.currency }}</span>
                                </td>
                                <td>
                                    <span>PAYPAL</span>
                                </td>
                                <td>
                                    <span>{{ items.seller_name}}</span>
                                </td>
                                <td>
                                    <span>{{ items.vendor_name}}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="foot-table">
                        <div class="left">
                                    <span>Rows Per Page:
                                        <select>
                                            <option value="4" selected>4</option>
                                            <option value="3">3</option>
                                            <option value="2">2</option>
                                            <option value="1">1</option>
                                        </select>
                                    </span>
                        </div>
                        <div class="right">
                            <span>1-4 of 20 Items</span>
                            <img src="/img/prev-arrow.png" class="prev-itm" alt="">
                            <img src="/img/next-arrow.png" class="next-itm" alt="">
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
            user: this.$store.state.auth.user,
            paydetails: [],
        }
    },
    created() {
        this.fetch();
    },
    methods:{
        fetch(){
            

            document.getElementById('ajaxLoader').style.display = 'block';
            var url = "/api/admin-payment-details";
            axios.get(url)
                .then(res => {
                    this.paydetails = res.data.data;
                    console.log(this.paydetails)
                })
                .catch(err => console.log(err))
                .finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        }
    }
}
</script>
