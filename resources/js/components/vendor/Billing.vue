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
                        <!-- <div class="col">
                        <div class="select-bx-sho mr-3">
                            <button class="primary uploadImages-bx"><i class="fas fa-cloud-upload-alt mr-2"></i><strong>
                                <input type="file" class="uploadpic-bx" style="display: none;">
                                <a href="/vendor/upload/products" class="">
                            UPLOAD
                            </a></strong></button>
                        </div> 
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                  <label class="upload__btn">
                                    <p>Upload images</p>
                                    <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                                  </label>
                                </div>
                              <div class="upload__img-wrap"></div>
                            </div>
                            <div class="mediaGallerybox">                                
                                <!-- <div class="mediaUploadImg activeUploadedImg"><img class="img-uploaded-image" width="100" height="100" src="/img/nike-shoes.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/products-img-1.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/nike-shirt.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/templae-sample-3.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/cotton-shirt.png"></div>
                                <div class="mediaUploadImg"><img class="img-uploaded-image" width="100" height="100" src="/img/img-upload-product.jpg"></div> -->
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
/* START UPLOAD SCRIPT*/
jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
</script>
<style>
.upload__btn p {
    margin-bottom: 0;
}
.upload__box {
    padding: 40px;
    position: relative;
}
 .upload__inputfile {
	 width: 0.1px;
	 height: 0.1px;
	 opacity: 0;
	 overflow: hidden;
	 position: absolute;
	 z-index: -1;
}
.upload__btn {
    font-weight: 600;
    color: #0862a3;
    padding: 5px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid;
    background-color: #e7e7e7;
    border-color: #e7e7e7;
    border-radius: 10px;
    font-size: 14px;
    height: 108px;
    display: flex;
    text-align: center;
    align-items: center;
    width: 100%;
    justify-content: center;
}
 .upload__btn:hover {
	 background-color: unset;
	 transition: all 0.3s ease;
}
.upload__btn-box {
    margin-bottom: 10px;
    position: absolute;
}
 .upload__img-wrap {
	 display: flex;
	 flex-wrap: wrap;
	 margin: 0 -10px;
}
 .upload__img-box {
	 width: 128px;
	 padding: 0 10px;
	 margin-bottom: 12px;
}
.upload__img-wrap .upload__img-box:first-child {
    margin-left: 128px;
}
 .upload__img-close {
	 width: 24px;
	 height: 24px;
	 border-radius: 50%;
	 background-color: rgba(0, 0, 0, 0.5);
	 position: absolute;
	 top: 10px;
	 right: 10px;
	 text-align: center;
	 line-height: 24px;
	 z-index: 1;
	 cursor: pointer;
}
 .upload__img-close:after {
	 content: '\2716';
	 font-size: 14px;
	 color: white;
}
 .img-bg {
	 background-repeat: no-repeat;
	 background-position: center;
	 background-size: cover;
	 position: relative;
	 padding-bottom: 100%;
}
</style>
