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
    }
}
</script>
