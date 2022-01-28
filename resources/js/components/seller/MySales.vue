<template>

    <div class="container-fluid pending-vend sellerMySales">
        <div class="row mb-4">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3 my-3">
                        <select class="select-custom-point">
                            <option value="" selected>Choose Year</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                    <div class="col-sm-3 my-3">
                        <select class="select-custom-point"  @click="soldProductStatistics(1, 0, 'name' )">
                            <option value="" selected>Choose Month</option>
                            <option value="Janruary">Janruary</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="box graphs">
                            <div class="left">
                                <span>Total Earnings</span>
                                <h1>$25,456</h1>
                                <i class="green"><img src="/img/up.png" alt=""> +28.45%</i>
                            </div>
                            <div class="right">
                                <img src="/img/green-graph.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box graphs">
                            <div class="left">
                                <span>Product Sold</span>
                                <h1>$32,568</h1>
                                <i class="green"><img src="/img/up.png" alt=""> +23.57%</i>
                            </div>
                            <div class="right">
                                <img src="/img/green-graph.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box graphs">
                            <div class="left">
                                <span>Total Revenue</span>
                                <h1>$46,587</h1>
                                <i class="red"><img src="/img/down-red.png" alt=""> -23.57%</i>
                            </div>
                            <div class="right">
                                <img src="/img/red-graph.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="top-newOrder">

                    <table class="table mobile-btn-show">
                        <thead>
                        <tr>
                            <th scope="col" @click="soldProductStatistics(1, 0, 'name' )"><span class="sort-ad">Product Name <img class="shuffle"
                                                                                    src="/img/shuffle.png"></span></th>
                            <th scope="col" @click="soldProductStatistics(1, 0, 'parent_category' )"><span class="sort-ad">Categories <img class="shuffle"
                                                                                  src="/img/shuffle.png"></span></th>
                            <th scope="col">Sold</th>
                            <th scope="col">Price</th>
                            <th scope="col">Earnings</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in products">
                            <td>
                                          <span class="txt-cont">
                                            <img src="/img/nike-shoe1.png" alt="">
                                            <span>{{ product.name }}</span></span>
                            </td>
                            <td>
                                <span>{{ product.parent_category }} {{ product.sub_category }}</span>
                            </td>
                            <td>
                                <span>{{ product.sold }}</span>
                            </td>
                            <td>
                                <span>${{ product.net_price }}</span>
                            </td>
                            <td>
                                <span>${{ product.net_price * product.sold }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="foot-table">
                        <div class="left">
                                    <span>Rows Per Page:
                                        <select @change="soldProductStatistics(current_page, $event.target.value)">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select>
                                    </span>
                        </div>
                        <div class="right">
                            <span>{{ from }}-{{ to }} of {{ total }} Items</span>
                            <img v-if="from > 1" src="/img/prev-arrow.png" @click="soldProductStatistics(current_page-1)" class="prev-itm"
                                 alt="">
                            <img v-if="to < total" src="/img/next-arrow.png" @click="soldProductStatistics(current_page+1)" class="next-itm"
                                 alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    data () {
        return {
            user: this.$store.state.auth.user,
            to: 0,
            total: 0,
            from: 0,
            per_page: 0,
            current_page: 0,
            order_by: 0,
            order: 0,
            products: []
        }
    },
    created() {
        this.soldProductStatistics();
    },
    methods: {
        soldProductStatistics(page = 1, per_page = 0, order_by = 0) {
            document.getElementById('ajaxLoader').style.display = 'block';

            var year         = document.getElementsByClassName('year');
            var month        = document.getElementsByClassName('month');

            var order_by = order_by;
            var per_page = per_page;

            if(order_by != 0) {
                this.order_by = order_by;
            }

            if(per_page != 0) {
                this.per_page = per_page;
            }

            var url = '/api/seller/sold/statistics/'+ this.user.id;

            if (this.order_by > 0) {
                if (this.order == 'asc') {
                    this.order = 'desc';
                } else {
                    this.order = 'asc';
                }
                url += '/' + this.order_by;
                url += '/' + this.order;
            } else {
                url += '/id';
                url += '/desc';
            }

            if(typeof year[0] !== 'undefined') {
                url += '/' + year[0].value;
            } else {
                url += '/0';
            }

            if(typeof month[0] !== 'undefined') {
                url += '/' + month[0].value;
            } else {
                url += '/0';
            }

            url += '/' + this.per_page;

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.products       = res.products.data;
                    this.to             = res.products.to;
                    this.from           = res.products.from;
                    this.total          = res.products.total;
                    this.current_page   = res.products.current_page;
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        }
    }
}
</script>
