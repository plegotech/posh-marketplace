<template>

    <div class="container-fluid pending-vend sellerMySales">
        <div class="row mb-4" >
            <div class="col-sm-12">
                 <div class="row">
                            <div class="col-sm-3 my-3">
                                <select name="" id="">
                                    <option value="" selected>Choose Year</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                </select>
                            </div>
                            <div class="col-sm-3 my-3">
                                <select name="" id="">
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
                            
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col"><span class="sort-ad">Product Name <img class="shuffle" src="/img/shuffle.png"></span></th>
                                    <th scope="col"><span class="sort-ad">Categories <img class="shuffle" src="/img/shuffle.png"></span></th>
                                    <th scope="col">Sold</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Earnings</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>  
                                          <span class="txt-cont">
                                            <img src="/img/nike-shoe1.png" alt="">
                                            <span>Nike Air Max Torch 3
                                                Men’s Running Shoes</span></span>
                                      </td>
                                      <td>
                                          <span>Nike</span>
                                      </td>
                                      <td>
                                          <span>1250</span>
                                      </td>
                                      <td>
                                          <span>$150</span>
                                      </td>
                                      <td>
                                          <span>$20,000</span>
                                      </td>
                                    </tr>
                                    <tr>
                                        <td>  
                                            <span class="txt-cont">
                                              <img src="/img/nike-shoe1.png" alt="">
                                              <span>Nike Air Max Torch 3
                                                  Men’s Running Shoes</span></span>
                                        </td>
                                        <td>
                                            <span>Nike</span>
                                        </td>
                                        <td>
                                            <span>1250</span>
                                        </td>
                                        <td>
                                            <span>$150</span>
                                        </td>
                                        <td>
                                            <span>$20,000</span>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>  
                                            <span class="txt-cont">
                                              <img src="/img/nike-shoe1.png" alt="">
                                              <span>Nike Air Max Torch 3
                                                  Men’s Running Shoes</span></span>
                                        </td>
                                        <td>
                                            <span>Nike</span>
                                        </td>
                                        <td>
                                            <span>1250</span>
                                        </td>
                                        <td>
                                            <span>$150</span>
                                        </td>
                                        <td>
                                            <span>$20,000</span>
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
