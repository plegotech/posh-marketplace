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
                                    <label class="form-label">Product Name</label>
                                    <p class="input-tip-bx">Do not exceed 20 characters when entering the
                                        product name.</p>
                                </div>
                                <div class="form-outline-ft mb-5">
                                    <input v-model="product.price" type="number" placeholder="200" class="form-control-label" required>
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
                                        <img src="/img/img-upload-product.jpg" class="img-fluid img-upload-vup">
                                        <p class="img-title-up">Upload Image</p>
                                    </div>
                                </div>
                                <div>
                                    <button @click="addProduct" class="primary">
                                        {{ processing ? "PLEASE WAIT..." : "SAVE PRODUCT" }}
                                    </button>

                                    <div v-for="error in errors"  class="form-row text-center">
                                        <p>{{ error[0] }}</p>
                                    </div>

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
    data() {
        return {
            parent_categories:      null,
            processing:             false,
            errors:                 null,
            brands: null,
            product: {
                name:                   null,
                net_price:              null,
                parent_category:        null,
                brand:                  null,
                description:            null,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    },

    created() {
        this.parent_categories  = SITE_CATEGORIES;
        this.brands             = SITE_BRANDS;
    },

    methods: {
        addProduct() {
            this.processing = true
            fetch('/api/product', {
                method: 'post',
                body: JSON.stringify(this.product),
                headers: {
                    'content-type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {

                    if (data.success == 'true') {
                        alert('product created successfully.');
                        this.clearForm();
                    } else {
                        this.errors = data.errors;
                    }

                })
                .catch(err => console.log(err))
                .finally(()=>{
                this.processing = false;
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
