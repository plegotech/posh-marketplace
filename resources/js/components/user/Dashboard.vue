<template>

    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="box-shadow-wbg option-bx-p">
                    <div class="d-flex justify-content-between mobile-d-scroll">
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/total-sales-icons.png" width="134" height="80" alt=""></div>
                            <div class="secBox-rtxt">
                                <span>Orders</span>
                                <h3>{{ total_orders }}</h3>
                            </div>
                        </div>
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/pending-orders.png" width="124" height="70" alt=""></div>
                            <div class="secBox-rtxt">
                                <span>Pending Orders</span>
                                <h3>{{ pending_orders }}</h3>
                            </div>
                        </div>
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/cancel-icon.png" width="101" height="69" alt=""></div>
                            <div class="secBox-rtxt">
                                <span>Cancelled Orders</span>
                                <h3>{{ cancelled_orders }}</h3>
                            </div>
                        </div>
                        <div class="sec-box">
                            <div class="secBox-img"><img src="/img/ok-icon.png" width="101" height="69" alt=""></div>
                            <div class="secBox-rtxt">
                                    <span>Successful Orders</span>
                                    <h3>{{ successful_orders }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="box-shadow-wbg">
                    <h2 class="title-b-inside">Sales Report</h2>
                    <div class="chart-box-dash">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-shadow-wbg">
                    <h2 class="title-b-inside">Earnings</h2>
                    <div class="chart-box-dash">
                        <canvas id="polarArea"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-wbg">
                    <h2 class="title-b-inside">Recent Orders</h2>
                    <div class="recent_table-bxes">

                    <table class="table recent-Orders-table mobile-btn-show" id="vendor_DB">
                        <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Product</th>
                            <th scope="col">Tracking Id</th>
                            <th scope="col">Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Pricing</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Shipping Deal</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in orders">
                                <td>
                                    <span class="blue-txt">{{ order.id }}</span>
                                </td>
                                <td>
                                    <span>{{ order.name }}</span>
                                </td>
                                <td>
                                    <span>MRP0043456</span>
                                </td>
                                <td>
                                    <span>{{ order.ordered_at }}</span>
                                </td>
                                <td>
                                    <span>{{ order.quantity }}</span>
                                </td>
                                <td>
                                    <span v-if="order.total_sold">${{ order.total_sold }}</span>
                                </td>
                                <td>
                                    <span :class="order.progress">{{ order.progress }}</span>
                                </td>
                                <td>
                                    <span>{{ order.payment_method }}</span>
                                </td>
                                <td>
                                    <span>{{ order.shipping_address }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                total_orders:           0,
                pending_orders:         0,
                cancelled_orders:       0,
                successful_orders:      0,
                user:                   this.$store.state.auth.user,
                orders:                 []
            }
        },
        created() {
            this.LoadSalesGraph()
            this.dashboard()
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
            dashboard() {

                if(this.user.user_type == 'vendor') {
                    var url = '/api/vendor/dashboard/' + this.user.id;
                } else {
                    var url = '/api/seller/dashboard/' + this.user.id;
                }

                fetch(url)
                    .then(res => res.json())
                    .then(res => {
                        this.total_orders           = res.total_orders;
                        this.pending_orders         = res.pending_orders;
                        this.cancelled_orders       = res.cancelled_orders;
                        this.successful_orders      = res.successful_orders;
                        this.orders                 = res.orders;
                    })
                    .catch(err => console.log(err))
                    .finally(() => {
                        document.getElementById('ajaxLoader').style.display = 'none';
                    });
            }
        },
            
        mounted() {
            console.log('Component mounted.')
            //Bar Chart Begins from here!

        },
        
    }
</script>
