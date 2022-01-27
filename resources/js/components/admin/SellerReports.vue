<template>

    <div class="container-fluid seller_ord">
        <div class="row">
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <input placeholder="From" type="text" class="datepicker">
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="datepicker-d">
                    <input placeholder="To" type="text" class="datepicker">
                    <i class="fa fa-calendar-check calendar"></i>
                </div>
            </div>
            <div class="col-sm-2 mt-4">
                <select name="" id="">
                    <option value="">
                    <option value="" selected>Current Year</option>
                    </option>
                </select>
            </div>
            <div class="col-sm-2 offset-sm-2">
                <button class="mt-4">CLEAR ALL</button>
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
    }
}
</script>
