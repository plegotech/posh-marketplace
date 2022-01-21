<template>

    <div class="container-fluid pending-vend">

        <div class="row" style="margin-top:20px">

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <select name="" id="" class="chooseY-bx">
                            <option value="" selected>Choose Year</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>
                        <select name="" id="" class="chooseY-bx">
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

                <div class="top-newOrder payment_Hist">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">View Report</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>$23,135.99</span>
                            </td>
                            <td>
                                            <span>
                                                <img class="pdf-down" id="pdf-down" src="/img/pdf.png" alt="">
                                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>$23,135.99</span>
                            </td>
                            <td>
                                            <span>
                                                <img class="pdf-down" id="pdf-down" src="/img/pdf.png" alt="">
                                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>$23,135.99</span>
                            </td>
                            <td>
                                            <span>
                                                <img class="pdf-down" id="pdf-down" src="/img/pdf.png" alt="">
                                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>$23,135.99</span>
                            </td>
                            <td>
                                            <span>
                                                <img class="pdf-down" id="pdf-down" src="/img/pdf.png" alt="">
                                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>$23,135.99</span>
                            </td>
                            <td>
                                            <span>
                                                <img class="pdf-down" id="pdf-down" src="/img/pdf.png" alt="">
                                            </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>06/24/2021</span>
                            </td>
                            <td>
                                <span>$23,135.99</span>
                            </td>
                            <td>
                                            <span>
                                                <img class="pdf-down" id="pdf-down" src="/img/pdf.png" alt="">
                                            </span>
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
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
