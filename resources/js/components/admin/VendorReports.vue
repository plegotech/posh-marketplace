<template>

    <div class="container-fluid seller_ord">
         <div class="row">
        <div class="col-12">
         <br>
        <div class="box-w-shad">
        <div class="row">
            <div class="col-sm-3 mb-xs-20">
                <div class="datepicker-d">
                    <input placeholder="From" type="text" class="datepicker">
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-sm-3 mb-xs-20">
                <div class="datepicker-d ">
                    <input placeholder="To" type="text" class="datepicker">
                    <i class="fa fa-calendar-check calendar"></i>
                </div>
            </div>
            <div class="col-sm-2 mb-xs-20">
                <select name="" id="" class="select-custom-point">
                    <option value="">
                    <option value="" selected>Current Year</option>
                    </option>
                </select>
            </div>
            <div class="col-sm-2 mb-xs-20 offset-sm-2">
                <button class="">CLEAR ALL</button>
            </div>
        </div>
            </div>
        </div>
            </div>
        
        <br>
        <div class="row">
            <h1>Product Report</h1>
            <a class="export_item">Export CSV</a>
            
            
            <div class="col-sm-3">
            <div class="box mb-sm-12">
                <canvas id="polarArea"></canvas>
            </div>
            </div>
            <div class="col-sm-3 mb-sm-12">
             <div class="box">
                <canvas id="barChart"></canvas>
                </div>
                </div>
            <div class="col-sm-3 mb-sm-12">
             <div class="box">
                <canvas id="line_Chart"></canvas>
                </div>
            </div>
            <div class="col-sm-3 mb-sm-12">
             <div class="box">
                <canvas id="doughnut"></canvas>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="box">
                    <div class="left">
                        <img src="/img/Ellipse 8.png" alt="">
                    </div>
                    <div class="right">
                        <span>Active Products</span>
                        <h2>1,230</h2>
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
                        <h2>406</h2>
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
                        <h2>$29,318.34</h2>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div style="position:relative">

            <h1 class="pd-0">Order Report</h1>
            <a class="export_item" style="right:7px">Export CSV</a>
            <div class="seller-ord">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box-seller bg-green">
                            <div class="left">
                                <div class="content">
                                    <span>Purchased Orders</span>
                                    <h3>1,454</h3>
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
                                    <h3>$2,352.90</h3>
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

export default {
    mounted() {
        console.log('Component mounted.')
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
