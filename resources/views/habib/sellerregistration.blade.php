@extends('layouts.app')

@section('content')
<div id="" class="">
    <div class="seller-registration">
        <div class="container-fluid">
        <div class="row">
                <div class="col-sm-12"><h1 class="main-title text-center my-2">Create Account</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-6 sellerReg-opt active"><span class="number-opt-b">1</span> Personal Details</div>
                <div class="col-sm-6 sellerReg-opt"><span class="number-opt-b">1</span> Personal Details</div>
            </div>
            <div class="createAccount-bx my-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input placeholder="First Name*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input placeholder="Last Name*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <select id="inputState" class="form-control">
                            <option selected>Gender*</option>
                            <option> Male</option>
                            <option> Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input placeholder="Email Address*" class="form-control" type="email">
                    </div>
                    <div class="form-group col-md-6">
                        <input placeholder="Company Name" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input placeholder="Business License" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12">
                        <input placeholder="Address*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input placeholder="Email Address*" class="form-control" type="email">
                    </div>
                    <div class="form-group col-md-6">
                        <select id="inputState" class="form-control">
                            <option selected>Gender*</option>
                            <option> Male</option>
                            <option> Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input placeholder="Ein Number*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input placeholder="Phone Number*" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <input id="Password" name="Password" placeholder="Password*" class="form-control" type="password">
                    </div>
                    <div class="form-group col-md-6">
                        <input id="Confirm Password" name="Confirm Password" placeholder="Confirm Password*" class="form-control" type="password">
                    </div>
                    <div class="form-row text-center col-sm-12">
                        <button type="button" class="primary rsv-bx mx-424"><strong>NEXT </strong><span class="dr-arrow"><img src="/img/double-right-arrow.png" height="24" width="24" class="img-fluid img-m100"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
