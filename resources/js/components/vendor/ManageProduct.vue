<template>
<div class="container-fluid pending-vend">
        <div class="modal fade viewProducts-modal-lg viewProduct-modal" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-4">
                    <img src="/img/cancel.png" class="cancel-popup" alt="">
                    <img :src="'/img/vendor-logos/'+ company.logo" style="max-width: 150px; height: auto"
                         alt="">
                     <!-- START CONTENT  -->
                     <div class="row mb-4 up-main-bx">
                        <div class="col-sm-6">
                            <div class="up-main-bx-1">
                                <div class="form-outline-ft mb-5">
                                    <input type="text" value="Apple Airpod" class="form-control-label" required>
                                    <label class="form-label">Product Name</label>
                                    <p class="input-tip-bx">Do not exceed 20 characters when entering the
                                        product name.</p>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" value="$200" class="form-control-label" required>
                                    <label class="form-label">Price</label>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <img src="/img/help-icon.png" class="help-tag-righ" width="30" height="30">
                                    <select class="form-control-label select-custom-point">
                                        <option>Electronic Accessories</option>
                                        <option>Electronic</option>
                                        <option>Accessories</option>
                                    </select>
                                    <span class="form-label">Category</span>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <select class="form-control-label select-custom-point">
                                        <option>Apple</option>
                                        <option>Electronic</option>
                                        <option>Accessories</option>
                                    </select>
                                    <span class="form-label">Brand</span>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <img src="/img/help-icon.png" class="help-tag-righ" width="30" height="30">
                                    <textarea class="form-control-label" rows="6"></textarea>
                                    <p class="input-tip-bx">Do not exceed 100 characters when entering the product description.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="up-main-bx-2">
                                <div class="uploadimage-vup">
                                    <div class="upload-title-vup">
                                        <p>Product Image <img src="/img/help-icon.png" class="img-ut-vup"
                                                              width="30" height="30"></p>
                                    </div>
                                    <div class="upload-image-vup">
                                        <img src="/img/img-upload-product.jpg" class="img-fluid img-upload-vup">
                                        <p class="img-title-up">Upload Image</p>
                                    </div>
                                </div>
                                <div class="form-outline-ft mt-5 mb-3">
                                    <div class="datepicker-d">
                                        <datepicker placeholder="To" class="datepicker hasDatepicker"></datepicker>
                                        <i class="fa fa-calendar-check calendar"></i>
                                    </div>
                                    <span class="form-label">Product Date</span>
                                </div>
                                <div>
                                    <button class="primary">SAVE PRODUCT</button>
                                    <button class="primary">UPLOAD MULTIPLE PRODUCTS</button>
                                    <button class="primary">REMOVE PRODUCT</button>
                                    <p class="downl-csv">DOWNLOAD SAMPLE TEMPLATE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- END CONTENT -->
                </div>
            </div>
        </div>
        
        <div class="row mt-4" >
            <div class="col-sm-12">
                <div class="top-newOrder myorder mb-4">
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
                        <div class="col-sm-8">
                            <div class="row justify-content-lg-end">
                                <div class="col-md-auto w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>Sort By</option>
                                        <option value="">Name</option>
                                        <option value="">Number</option>
                                    </select>
                                </div>
                                <div class="w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>Sub Category</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                                <div class="w-auto mr-3">
                                    <select class="select-custom-point" name="" id="">
                                        <option value="" selected>All</option>
                                        <option value="">one</option>
                                        <option value="">two</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- START:: Products listing -->
                    <div class="row justify-content-end">
                        <div class="col-auto mb-4 ">
                            <button class="primary btn-box-shadow uploadbtn-wid"><i
                                class="fas fa-cloud-upload-alt mr-2"></i><strong>UPLOAD</strong></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue" data-toggle="modal" data-target=".viewProducts-modal-lg">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="products-listing-bxx">
                                <div class="">
                                    <img src="/img/products-img-1.png" alt="" class="">
                                </div>
                                <p class="plx-title">Nike Air Max Torch 3 Men’s Running Shoes...</p>
                                <div class="price-btn-bx">
                                    <div class="price-title-b">
                                        <h3><sup>$</sup> 150</h3>
                                    </div>
                                    <div class="pb-btn-list">
                                        <div class="btn-st btn-blue">VIEW</div>
                                        <div class="btn-st btn-green"><router-link :to="{ name: 'vendor-edit-products'}">EDIT</router-link></div>
                                        <div class="btn-st btn-red">DELETE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END  :: Products listing -->
                    <div class="row my-5">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <div aria-label="Page navigation paginate-bx">
                                <ul class="pagination bottm-pagination">
                                    <li class="page-item inactive">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
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

}
</script>
