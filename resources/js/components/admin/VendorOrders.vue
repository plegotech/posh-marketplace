<template>

    <div class="container-fluid pending-vend">
        <!-- start modal -->
        <div class="modal fade bd-example-modal-lg cstm-modal" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-4">
                    <img src="/img/cancel-icon.png" class="cancel-popup" alt="">
                    <img src="'/img/vendor-logos/'+ company.logo" style="max-width: 150px; height: auto"
                         alt="">

                    <form ref="form">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Company Name</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="email" class="form-control"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Phone</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Address</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>City</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>State</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Country</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Phone">
                                </div>
                            </div>
                            <div class="offset-sm-4 col-sm-8">
                                <div class="form-group">
                                    <button class="btn btn-light btn-block">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- start modal -->
        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <div class="top-newOrder myorder">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <div class="search-box" style="max-width:100%">
                                <form action="">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input type="text" class="search_BX">
                                    <img src="/img/close-srch.png" class="close-icon" alt="">
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 offset-sm-2">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select>
                                        <option value="" selected>Sort By</option>
                                        <option value="">Name</option>
                                        <option value="">Number</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select>
                                        <option value="" selected>Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select>
                                        <option value="" selected>Sub Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select>
                                        <option value="" selected>All</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="vendorOrder-bx-">
                    <table class="table recent-Orders-table mobile-btn-show" id="vendorOrder_Admin">
                        <thead>
                        <tr>
                            <th class="shuffle-bx" scope="col"><span class="sort-ad">Order Id <img class="shuffle" src="/img/shuffle.png"></span></th>
                            <th class="shuffle-bx" scope="col"><span class="sort-ad">Product Name <img class="shuffle" src="/img/shuffle.png"></span></th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Pricing</th>
                            <th scope="col">Delivery Status</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Shopping Details</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                    <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <span>Nike Shoes</span>
                                </td>
                                <td>
                                    <span>06/25/2021</span>
                                </td>
                                <td>
                                    <span>3</span>
                                </td>
                                <td>
                                    <span>$540</span>
                                </td>
                                <td>
                                    <span class="shipped">shipped</span>
                                </td>
                                <td>
                                    <span>Credit Card</span>
                                </td>
                                <td>
                                    <span>4949, Forecast Ave</span>
                                </td>
                                    <td>
                                         <div class="dropdown cst-slct">
                                                <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                     data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                                    <li class="view-mob">View</li>
                                                    <li class="edit-mob">Edit</li>
                                                    <li class="inactive-mob">Delete</li>
                                                </ul>
                                            </div>
                                     </td>
                            </tr>
                                                        <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                    <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <span>Nike Shoes</span>
                                </td>
                                <td>
                                    <span>06/25/2021</span>
                                </td>
                                <td>
                                    <span>3</span>
                                </td>
                                <td>
                                    <span>$540</span>
                                </td>
                                <td>
                                    <span class="shipped">shipped</span>
                                </td>
                                <td>
                                    <span>Credit Card</span>
                                </td>
                                <td>
                                    <span>4949, Forecast Ave</span>
                                </td>
                                <td>
                                     <div class="dropdown cst-slct">
                                                <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                     data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                                    <li class="view-mob">View</li>
                                                    <li class="edit-mob">Edit</li>
                                                    <li class="inactive-mob">Delete</li>
                                                </ul>
                                            </div>

                                </td>
                            </tr>
                                                        <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                    <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <span>Nike Shoes</span>
                                </td>
                                <td>
                                    <span>06/25/2021</span>
                                </td>
                                <td>
                                    <span>3</span>
                                </td>
                                <td>
                                    <span>$540</span>
                                </td>
                                <td>
                                    <span class="shipped">shipped</span>
                                </td>
                                <td>
                                    <span>Credit Card</span>
                                </td>
                                <td>
                                    <span>4949, Forecast Ave</span>
                                </td>
                                <td>
                                     <div class="dropdown cst-slct">
                                                <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                     data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                                    <li class="view-mob">View</li>
                                                    <li class="edit-mob">Edit</li>
                                                    <li class="inactive-mob">Delete</li>
                                                </ul>
                                            </div>

                                </td>
                            </tr>
                                                        <tr>
                                <td>
                                    <img src="/img/nike-shoe1.png" alt="">
                                    <span>AKN 1250</span>
                                    <i class="fa fa-angle-double-down mob-expand" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <span>Nike Shoes</span>
                                </td>
                                <td>
                                    <span>06/25/2021</span>
                                </td>
                                <td>
                                    <span>3</span>
                                </td>
                                <td>
                                    <span>$540</span>
                                </td>
                                <td>
                                    <span class="shipped">shipped</span>
                                </td>
                                <td>
                                    <span>Credit Card</span>
                                </td>
                                <td>
                                    <span>4949, Forecast Ave</span>
                                </td>
                                <td>
                                    <div class="dropdown cst-slct">
                                                <img src="/img/more.png" alt="" class="dropdown-toggle"
                                                     data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                                    <li class="view-mob">View</li>
                                                    <li class="edit-mob">Edit</li>
                                                    <li class="inactive-mob">Delete</li>
                                                </ul>
                                            </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
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

        <div class="row">
            <h1></h1>
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
