<template>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <datepicker :clear-button="true" v-model="first_date" :value="first_date"
                                @closed="basicStatistics()" placeholder="From"
                                class="datepicker hasDatepicker"></datepicker>
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <datepicker :clear-button="true" v-model="last_date" :value="last_date" @closed="basicStatistics()"
                                placeholder="To" class="datepicker hasDatepicker"></datepicker>
                    <i class="fa fa-calendar-check calendar"></i>
                </div>
            </div>
            <div class="col-sm-2">
                <select @change="clearFiltration();basicStatistics($event.target.value);" class="mtc-24">
                    <option value="0" selected>Select time period</option>
                    <option value="year">Current Year</option>
                    <option value="quarter">Current Quarter</option>
                    <option value="month">Current Month</option>
                </select>
            </div>
            <div class=" col-sm-4">
                <button @click="clearFiltration()" class="mtc-24 secondary float-right  mt-4">CLEAR ALL</button>
            </div>
        </div>
        <br>
        <div class="row">
            <h1>Analytics</h1>
            <div class="col-sm-6">
                <canvas id="barChart"></canvas>
            <br>
            </div>
            <div class="col-sm-6">
                <canvas id="polarArea"></canvas>
            <br>
            </div>
            <div class="col-sm-6">
                <canvas id="doughnut"></canvas>
            <br>
            </div>
            <div class="col-sm-6">
                <canvas id="line_Chart"></canvas>
            <br>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_106.png" alt="">
                    </div>
                    <div class="right"><span>Total Gross Sales</span>
                        <h2>${{ gross_sales }}</h2></div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_136.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Net Sales</span>
                        <h2>${{ net_sales }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Group_107.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Orders</span>
                        <h2>{{ total_orders }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-7">
                <h1 class="pd-0">Members</h1>
                <div class="box">
                    <div class="left">
                        <img src="/img/members-icon.png" alt="">
                    </div>
                    <div class="right">
                        <span>Total Vendors</span>
                        <h2>{{ total_vendors }}</h2>
                    </div>
                    <div class="right">
                        <span>Total Sellers</span>
                        <h2>{{ total_sellers }}</h2>
                    </div>
                    <div class="right">
                        <span>Total Users</span>
                        <h2>{{ total_users }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <h1 class="pd-0">Member Section</h1>
                <div class="box">
                    <div class="right">
                        <span>Vendor Sign Up Requests</span>
                        <h2>{{ vendor_request }}</h2>
                    </div>
                    <div class="right">
                        <span>Seller Sign Up Requests</span>
                        <h2>{{ seller_request }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">

            <div class="col-sm-6 mt-5">
                <h2>Sales By Categories</h2>
                <div>
                    <b-tabs content-class="mt-3">
                        <b-tab title="Current Year" active>
                            <!-- START:: CURRENT YEAR CONTENT -->
                            <table class="tabsTable">
                                <tbody>
                                <tr v-for="category in orders_by_year">
                                    <td>{{ category.parent_category }} {{ category.sub_category }}</td>
                                    <td>${{ category.total_sold }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END  :: CURRENT YEAR CONTENT -->
                        </b-tab>
                        <b-tab title="Current Month">
                            <!-- START:: CURRENT MONTH CONTENT -->
                            <table class="tabsTable">
                                <tbody>
                                <tr v-for="category in orders_by_month">
                                    <td>{{ category.parent_category }} {{ category.sub_category }}</td>
                                    <td>${{ category.total_sold }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END::   CURRENT MONTH CONTENT -->
                        </b-tab>
                        <b-tab title="Current Quarter">
                            <!-- START:: CURRENT QUARTER CONTETN -->
                            <table class="tabsTable">
                                <tbody>
                                <tr v-for="category in orders_by_quarter">
                                    <td>{{ category.parent_category }} {{ category.sub_category }}</td>
                                    <td>${{ category.total_sold }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END ::: CURRENT QUARTER CONTENT -->
                        </b-tab>
                    </b-tabs>
                </div>

            </div>
            <div class="col-sm-6 mt-5">
                <h2>Top 10 Sellers</h2>
                <div>
                    <b-tabs content-class="mt-3">
                        <b-tab title="Current Year" active>
                            <!-- START:: CURRENT YEAR CONTENT -->
                            <table class="tabsTable">
                                <tbody>
                                <tr v-for="seller in sellers_by_year">
                                    <td>{{ seller.first_name }} {{ seller.last_name }}</td>
                                    <td>${{ seller.total_sold }}</td>
                                </tr>
                                </tbody>

                            </table>
                            <!-- END  :: CURRENT YEAR CONTENT -->
                        </b-tab>
                        <b-tab title="Current Month">
                            <!-- START:: CURRENT MONTH CONTENT -->
                            <table class="tabsTable">
                                <tbody>
                                <tr v-for="seller in sellers_by_month">
                                    <td>{{ seller.first_name }} {{ seller.last_name }}</td>
                                    <td>${{ seller.total_sold }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END::   CURRENT MONTH CONTENT -->
                        </b-tab>
                        <b-tab title="Current Quarter">
                            <!-- START:: CURRENT QUARTER CONTETN -->
                            <table class="tabsTable">
                                <tbody>
                                <tr v-for="seller in sellers_by_quarter">
                                    <td>{{ seller.first_name }} {{ seller.last_name }}</td>
                                    <td>${{ seller.total_sold }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END ::: CURRENT QUARTER CONTENT -->
                        </b-tab>
                    </b-tabs>
                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <h1>Top Products</h1>
            <div class="col-sm-12">
                <div class="top-prodMain">
                    <table class="table recent-Orders-table mobile-btn-show" id="dashboardTop_Admin">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Vendor Company</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in top_products">
                            <td>
                                <img :src="'/img/product-images/' + product.vendor_id + '/' + product.featured_image"
                                     alt="">
                                <span>{{ product.name }}</span>
                                <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                            </td>
                            <td>
                                <span>{{ product.brand }}</span>
                            </td>
                            <td>
                                <span>{{ product.company }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <h1>
                Orders
            </h1>
            <div class="col-sm-12">

                <div class="top-newOrder">

                    <table class="table recent-Orders-table mobile-btn-show" id="newOrder_Admin">
                        <thead>
                        <tr>
                            <th scope="col"><span class="sort-ad">Order Id <img class="shuffle" src="/img/shuffle.png"></span>
                            </th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Seller Name</th>
                            <th scope="col">Vendor Company</th>
                            <th scope="col">Date of Purchase</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Paid</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="order in recent_orders">
                            <td>
                                <img :src="'/img/product-images/'+order.vendor_id+'/'+order.featured_image" alt="">
                                <span>{{ order.order_item_id }}</span>
                            </td>
                            <td>
                                <span>{{ order.product_name }}</span>
                            </td>
                            <td>
                                <span>{{ order.seller_first_name }} {{ order.seller_last_name }}</span>
                            </td>
                            <td>
                                <span>{{ order.vendor_first_name }} {{ order.vendor_last_name }}</span>
                            </td>
                            <td>
                                <span>{{ order.created_at }}</span>
                            </td>
                            <td>
                                <span>{{ order.quantitiy }}</span>
                            </td>
                            <td>
                                <span>${{ order.total_sold }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="foot-table">
                        <div class="left">
                                        <span>Rows Per Page:
                                            <select
                                                @change="orders(current_page, $event.target.value)">
                                                <option value="25" selected="">25</option>
                                                <option value="50">50</option>
                                                <option value="75">75</option>
                                                <option value="100">100</option>
                                            </select>
                                        </span>
                        </div>
                        <div class="right">
                            <span>{{ from }}-{{ to }} of {{ total }} Items</span>
                            <img v-if="from > 1"
                                 src="/img/prev-arrow.png" @click="orders(current_page-1)"
                                 alt="" class="prev-itm">
                            <img v-if="to < total"
                                 src="/img/next-arrow.png" @click="orders(current_page+1)"
                                 alt="" class="next-itm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import datepicker from 'vuejs-datepicker';

export default {
    name: "dashboard",
    data() {
        return {
            total: 0,
            from: 0,
            to: 0,
            current_page: 0,
            time_period: 0,
            gross_sales: null,
            net_sales: null,
            total_orders: null,
            vendor_request: null,
            seller_request: null,
            total_vendors: null,
            first_date: 0,
            last_date: 0,
            total_sellers: null,
            orders_by_month: [],
            orders_by_quarter: [],
            orders_by_year: [],
            sellers_by_month: [],
            sellers_by_quarter: [],
            sellers_by_year: [],
            top_products: [],
            recent_orders: [],
            total_users: null,
user: this.$store.state.auth.user,
        }
    },
    components: {
        datepicker
    },
    created() {
        
        this.basicStatistics();
        this.LoadSalesGraph();
        this.orders();
    },
    methods: {
            async LoadSalesGraph(){
                let result = axios.get('/api/vendor/salesgraph/'+this.user.id);
                if((await result).data!=null){
                    let labels = (await result).data.labels
                    let values = (await result).data.data
                    let earn = (await result).data.earn
                    console.warn((await result).data);

                    var barChart = document.getElementById('barChart');
                    var barChart = new Chart(barChart, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Monthly Sale',
                                data: values,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    //PolarArea Chart Begins Here!
                    var polarArea_ctx = document.getElementById('polarArea');
                    var polarArea = new Chart(polarArea_ctx, {
                        type: 'polarArea',
                        data: {
                            datasets: [{
                                data: earn,
                                backgroundColor: [
                                    '#d3d06e',
                                    '#6ed3d3',
                                    '#826ed3',
                                    '#d36ec7'
                                ]
                            }],
                            labels: labels,
                        },
                    });

                }
                
            },

        clearFiltration() {
            this.first_date = 0;
            this.last_date = 0;
            this.time_period = 0;
            this.basicStatistics(0);
            this.orders(0);
            this.clearFirstLastDate();
        },
        clearFirstLastDate() {
            let elements = document.getElementsByClassName('vdp-datepicker__clear-button');
            for(var i = 0; i < elements.length; i++) {
                let element = elements[i];
                element.click();
            }
        },
        basicStatistics(time_period = 0) {

            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/admin/basic-statistics';

            var time_period = time_period;

            if (time_period != 0 || this.time_period != 0) {
                if (time_period != 0) {
                    this.time_period = time_period;
                    this.first_date = 0;
                    this.last_date = 0;
                    this.clearFirstLastDate();
                }
                url += '/' + this.time_period;
            } else {
                url += '/0';
            }

            if (this.first_date != 0 && this.time_period == 0) {
                url += '/' + this.first_date;
            } else {
                url += '/0';
            }

            if (this.last_date != 0 && this.time_period == 0) {
                url += '/' + this.last_date;
            } else {
                url += '/0';
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.total_orders = res.total_orders;
                    this.vendor_request = res.vendor_request;
                    this.vendor_request = res.vendor_request;
                    this.seller_request = res.seller_request;
                    this.total_vendors = res.total_vendors;
                    this.total_sellers = res.total_sellers;
                    this.total_users = res.total_users;
                    this.gross_sales = res.gross_sales;
                    this.net_sales = res.gross_sales;
                    this.orders_by_year = res.orders_by_year;
                    this.orders_by_month = res.orders_by_month;
                    this.orders_by_quarter = res.orders_by_quarter;
                    this.sellers_by_year = res.sellers_by_year;
                    this.sellers_by_month = res.sellers_by_month;
                    this.sellers_by_quarter = res.sellers_by_quarter;
                    this.top_products = res.top_products;
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        orders(page = 0, per_page = 0) {
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

            if (page > 0) {
                url += '?page=' + page;
            }

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.recent_orders = res.data;
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
        }
    },
    mounted() {
        //Line Chart Begins from here!
        var line_Chart = document.getElementById('line_Chart');
        Chart.defaults.line.spanGaps = true;
        var stackedLine = new Chart(line_Chart, {
            type: 'line',
            data: {
                label: ["1", "2", "3", "4", "5", "6", "7"],
                xAxisID: ['4', '2', '8', '7', '16', '18', '6', '20'],
                yAxisID: ['4', '2', '8', '7', '16', '18', '6', '20'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [0, 20],
                    fill: true,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
                },
        });


        //Doughnut Begins Here!
        var doughnut_ctx = document.getElementById('doughnut');
        var doughnut = new Chart(doughnut_ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [15, 20, 15],
                    backgroundColor: [
                        '#0862a3',
                        '#a30808',
                        '#08a30d'
                    ]
                }],
                labels: [
                    'Blue',
                    'Red',
                    'Green'
                ],
            },
        });


    }
}
</script>
