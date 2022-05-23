<template>

    <div class="container-fluid pending-vend">
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="top-newOrder mb-4">
                    <div class="row ">
                        <div class="col-sm-6 ">
                            <div class="search-box mb-4 flaot-left">
                                <img src="/img/search-icon.png" alt="" class="search-icon">
                                <input type="text" class="search_BX pendingVendorSearch"> <img src="/img/close-srch.png" alt="" class="close-icon">
                            </div>
                        </div>
                        <div class="col">
                        <div class="select-bx-sho mr-3">
                            <button class="primary uploadImages-bx"><i class="fas fa-cloud-upload-alt mr-2"></i><strong>
                                <input type="file" class="uploadpic-bx" style="display: none;">
                                <a href="/vendor/upload/products" class="">
                            UPLOAD
                            </a></strong></button>
                        </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="mediaGallerybox">
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/nike-shoes.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/products-img-1.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/nike-shirt.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/templae-sample-3.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/cotton-shirt.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/img-upload-product.jpg"></div>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="uploadGalleryDetail">
                                <div class="uploadImage-bx">
                                    <div class="uploadedImage-be"><img class="img-uploaded-image" width="100" height="100" src="/img/nike-shoes.png"></div>
                                    <p><strong>File name:</strong> acernitro.jpg</p>
                                    <p><strong>File size:</strong> 23 KB</p>
                                    <p><strong>Uploaded By:</strong> Admin</p>
                                    <p><strong>Uploaded on:</strong> May 17, 2022</p>
                                </div>
                                <div class="uploadImage-fields">
                                    <div class="uploadfileds-bx"><span>URL</span><span><input type="text" value="https://posh-marketplace.plego.pro/"></span></div>
                                    <div class="uploadfileds-bx"><span>Title</span><span><input type="text" value="Acer Nitro"></span></div>
                                    <div class="uploadfileds-bx"><span>Alt Text</span><span><input type="text" value="Acer Nitro"></span></div>
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
