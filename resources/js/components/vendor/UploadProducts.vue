<template>
    <div class="container-fluid pending-vend">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <div class="top-newOrder myorder mb-4">
                    <div class="row mb-4 up-main-bx">
                        <div class="col-sm-6">
                            <div class="up-main-bx-1">
                                <div class="form-outline-ft mb-5">
                                    <input v-model="product.name" type="text" placeholder="Apple Airpod" class="form-control-label" required>
                                    <input id="vendor_id" v-model="product.vendor_id" type="hidden">
                                    <label class="form-label">Product Name</label>
                                    <p class="input-tip-bx">Do not exceed 20 characters when entering the
                                        product name.</p>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input v-model="product.net_price" type="number" placeholder="200" class="form-control-label" required>
                                    <label class="form-label">Price</label>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <img src="/img/help-icon.png" class="help-tag-righ" width="30" height="30">
                                    <select v-model="product.parent_category" class="form-control-label select-custom-point">
                                        <option v-for="(category, index) in parent_categories"
                                                :value="index">
                                            {{ index }}
                                        </option>
                                    </select>
                                    <span class="form-label">Category</span>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <select v-model="product.brand" class="form-control-label select-custom-point">
                                        <option v-for="brand in brands"
                                        :value="brand">{{ brand }}</option>
                                    </select>
                                    <span class="form-label">Brand</span>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <img src="/img/help-icon.png" class="help-tag-righ" width="30" height="30">
                                    <textarea v-model="product.description" class="form-control" rows="6"></textarea>
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
                                        <input type="file" ref="file" style="display: none" name="featured_image" @change="featuredImage" />
                                        <button @click="$refs.file.click()">open file dialog</button>
                                        <img src="/img/img-upload-product.jpg" class="img-fluid img-upload-vup">
                                        <p class="img-title-up">Upload Image</p>
                                    </div>
                                </div>
                                <div>
                                    <button @click="addProduct" class="primary">
                                        {{ processing ? "PLEASE WAIT..." : "SAVE PRODUCT" }}
                                    </button>

                                    <span v-for="(error, index) in errors" class="validationError">
                                        {{ error[0] }}
                                    </span>

                                    <button class="primary">UPLOAD MULTIPLE PRODUCTS</button>
                                    <button class="primary">REMOVE PRODUCT</button>
                                    <a class="downl-csv" target="_blank" download href="/files/products-sample.csv">DOWNLOAD SAMPLE TEMPLATE</a>
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
    data() {
        return {
            parent_categories:      null,
            processing:             false,
            errors:                 null,
            user:                   this.$store.state.auth.user,
            brands:                 null,
            product: {
                name:                   null,
                net_price:              null,
                vendor_id:              null,
                parent_category:        null,
                brand:                  null,
                description:            null,
                featured_image:         null,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },

    created() {
        this.parent_categories  = SITE_CATEGORIES;
        this.brands             = SITE_BRANDS;
        this.product.vendor_id    = this.user.id;
    },

    methods: {
        featuredImage(e) {
            this.product.featured_image = e.target.files[0];
        },
        addProduct() {
            document.getElementById('ajaxLoader').style.display = 'block';
            this.processing = true;

            var object = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();
            data.append('name', this.product.name);
            data.append('net_price', this.product.net_price);
            data.append('vendor_id', this.product.vendor_id);
            data.append('parent_category', this.product.parent_category);
            data.append('description', this.product.description);
            data.append('brand', this.product.brand);
            data.append('featured_image', this.product.featured_image);

            axios.post('/product', data, config)
                .then(function (res) {
                    var data = res.data;
                    if (data.success == 'true') {
                        alert('product created successfully.');
                        object.clearForm();
                    } else {
                        object.errors = data.errors;
                    }
                })
                .catch(function (res) {
                    console.log('--');
                    console.log(res);
                    console.log('--');
                })
                .finally(()=>{
                    this.processing = false;
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },
        clearForm() {
            this.product.name = null;
            this.product.net_price = null;
            this.product.parent_category = null;
            this.product.brand = null;
            this.product.description = null;
        }
    }
}
</script>
