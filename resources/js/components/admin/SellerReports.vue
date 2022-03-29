<template>

    <div class="container-fluid seller_ord">
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
                <select @change="basicStatistics($event.target.value)" class="mtc-24">
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
        <div class="row">
            <h1>Product Report</h1>
            <a class="export_item">Export CSV</a>
            
            <div class="col-sm-3">
                <canvas id="barChart"></canvas>
            <br>
            </div>
            <div class="col-sm-3">
                <canvas id="polarArea"></canvas>
            <br>
            </div>
            <div class="col-sm-3">
                <canvas id="doughnut"></canvas>
            <br>
            </div>
            <div class="col-sm-3">
                <canvas id="line_Chart"></canvas>
            <br>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Ellipse 8.png" alt="">
                    </div>
                    <div class="right">
                        <span>Active Products</span>
                        <h2>{{ active_products }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Ellipse 9.png" alt="">
                    </div>
                    <div class="right">
                        <span>Archive Products</span>
                        <h2>{{ archive_products }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <div class="left">
                        <img src="/img/Ellipse 10.png" alt="">
                    </div>
                    <div class="right">
                        <span>Products/Services Purchased</span>
                        <h2>${{ gross_sales }}</h2>
                    </div>
                </div>
            </div>
        </div>
<br>
        <div style="position:relative">

            <h1 class="pd-0">Order Report</h1>
            <a class="export_item" style="right:7px">Export CSV</a>

            <div class="seller-ord sellerReports-bxb">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box-seller bg-green">
                            <div class="left">
                                <div class="content">
                                    <span>Purchased Orders</span>
                                    <h3>{{ purchased_orders }}</h3>
                                </div>
                            </div>
                            <div class="right">
                                <img src="/img/Ellipse 3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-seller bg-blue">
                            <div class="left">
                                <div class="content">
                                    <span>Products/Services Purchased</span>
                                    <h3>$23,434.00</h3>
                                </div>
                            </div>
                            <div class="right">
                                <img src="/img/Ellipse 4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box-seller bg-yellow">
                            <div class="left">
                                <div class="content">
                                    <span>Average Purchased Orders</span>
                                    <h3>${{ gross_sales / purchased_orders }}</h3>
                                </div>
                            </div>
                            <div class="right">
                                <img src="/img/Ellipse 5.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-seller bg-red">
                            <div class="left">
                                <div class="content">
                                    <span>Cancelled Orders</span>
                                    <h3>0</h3>
                                </div>
                            </div>
                            <div class="right">
                                <img src="/img/Ellipse 6.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import datepicker from "vuejs-datepicker";

export default {
    data() {
        return {
            active_products: 0,
            first_date: 0,
            last_date: 0,
            time_period: 0,
            archive_products: 0,
            purchased_orders: 0,
            gross_sales: 0,
            cancelled_orders: 0
        }
    },
    components: {
        datepicker
    },
    created() {
        this.basicStatistics();
    },
    methods: {
        basicStatistics(time_period = 0) {

            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/admin/statistics';

            var time_period = time_period;

            if (time_period != 0 || this.time_period != 0) {
                if (time_period != 0) {
                    this.time_period = time_period;
                    this.first_date = 0;
                    this.last_date = 0;
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
                    this.active_products                = res.active_products;
                    this.archive_products               = res.archive_products;
                    this.purchased_orders               = res.purchased_orders;
                    this.cancelled_orders               = res.cancelled_orders;
                    this.gross_sales                    = res.gross_sales;
                })
                .catch(err => console.log(err))
                .finally(() => {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        clearFiltration() {
            this.time_period            = 0;
            this.first_name             = 0;
            this.last_name              = 0;
            this.basicStatistics(0);
        },
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

        //Bar Chart Begins from here!
        var barChart = document.getElementById('barChart');
        var barChart = new Chart(barChart, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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


        //PolarArea Chart Begins Here!
        var polarArea_ctx = document.getElementById('polarArea');
        var polarArea = new Chart(polarArea_ctx, {
            type: 'polarArea',
            data: {
                datasets: [{
                    data: [15, 20, 10, 5],
                    backgroundColor: [
                        '#d3d06e',
                        '#6ed3d3',
                        '#826ed3',
                        '#d36ec7'
                    ]
                }],
                labels: [
                    'Yellow',
                    'Sky Blue',
                    'Purple',
                    'Pink'
                ],
            },
        });
    }
}
</script>
