<template>
    <div class="container-fluid pending-vend">
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="top-newOrder myorder mb-4">
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
                                        <img src="/img/img-upload-dummy.jpg" class="img-fluid img-upload-vup">
                                        <input type="file" ref="file" style="display: none" name="featured_image" @change="featuredImage" />
                                        <button class="img-title-up" @click="$refs.file.click()">Upload Image</button>
                                    </div>
                                </div>
                                <div class="form-outline-ft mt-5 mb-3">
                                    <select class="form-control-label select-custom-point">
                                        <option>10/11/2021</option>
                                        <option>Electronic</option>
                                        <option>Accessories</option>
                                    </select>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
