<template>

    <div class="container-fluid pending-vend">

        <br>

        <div class="prof-area vendor-pro-b1">
            <div class="row">
                <div class="col-sm-4">
                    <div class="user-prof">
                        <img src="/img/user_profile.png" alt="">
                        <h1>William Smith</h1>
                        <span>william.smith@gmail.com</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <table class="user-desc">
                        <tbody>
                        <tr>
                            <td>Company Name</td>
                            <td>Plego</td>
                        </tr>
                        <tr>
                            <td>Company Phone</td>
                            <td>234-234-6243</td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>+1 123 456 7890</td>
                        </tr>
                        <tr>
                            <td>Website URL</td>
                            <td>www.plego.com</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class=" col-sm-4">
                    <button class="edit">
                        <img src="/img/edit.png" alt="">EDIT PROFILE
                    </button>
                </div>
            </div>
        </div>
        <div class="prof-area vendor-pro-b2">
            <div class="row">
                <div class="col-sm-9">
                    <h1 class="mini-head">Company Location</h1>
                </div>

                <div class="col-sm-3">
                    <button class="add-new">
                        <img src="/img/add.png" alt="">ADD NEW
                    </button>
                    <button class="edit sm-wd">
                        <img src="/img/edit.png" alt="">EDIT
                    </button>
                </div>
                <div class="col-sm-4">
                    <table class="comp-addr">
                        <tbody>
                        <tr>
                            <td>
                                <h2>Address</h2>
                                <span>3353, c4 Forest Ave</span>
                            </td>
                            <td>
                                <h2>State</h2>
                                <span>California</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>City</h2>
                                <span>Los Angeles</span>
                            </td>
                            <td>
                                <h2>Zip Code</h2>
                                <span>90007</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="prof-area vendor-pro-b3" style="display:none">
            <div class="row">
                <div class="col-sm-9">
                    <h1 class="mini-head">Add Bank Details</h1>
                </div>

                <div class="col-sm-3">
                    <button class="add-new">
                        <img src="/img/add.png" alt="">ADD NEW
                    </button>
                    <button class="edit sm-wd">
                        <img src="/img/edit.png" alt="">EDIT
                    </button>
                </div>
                <div class="col-sm-12">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" placeholder="Account Holder Name*">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" placeholder="Bank Name*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" placeholder="Account Number*">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" placeholder="Credit Card Number*">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row indep-btn">
            <div class="offset-sm-9 col-sm-3">
                <button class="edit sm-wd">
                    CANCEL
                </button>
                <button class="add-new">
                    SAVE
                </button>
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
