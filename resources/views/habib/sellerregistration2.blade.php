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
                <div class="col-sm-6 sellerReg-opt active"><span class="number-opt-b">1</span> Personal Details</div>
            </div>
            <div class="container my-5">
            <div class="tier-box-area">    
                <div class="row">
                    <div class="col-12 text-center"><h1 class="main-title mb-4">Select Tier</h1></div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="box-a-tier">
                            <i class="num-count-bx">1</i>
                            <h4 class="txt-blue">Free Tier</h4>
                            <p>Only 10 Products</p>
                            <button class="primary">START NOW</button>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="box-a-tier">
                        <i class="num-count-bx">2</i>
                            <h4 class="txt-blue">Tier 2</h4>
                            <p>Only 10 Products</p>
                            <button class="primary">START NOW</button>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="box-a-tier">
                        <i class="num-count-bx">3</i>
                            <h4 class="txt-blue">Tier 2</h4>
                            <p>Only 10 Products</p>
                            <button class="primary">START NOW</button>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-5">
                <div class="col-sm-12 text-center">
                    <h1 class="main-title mb-4">Select Product Categories</h1>
                    <div class="input-group justify-content-center select-pro-cat">
                    <select v-model="selected">
                        <option value="all">All</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                <input type="text" class="form-control" placeholder="Browse Category">
                <div class="input-group-append">
                    <button class="primary" type="button"> <i class="fa fa-search"></i></button> </div>
            </div>
                </div>                
                </div>

                <div class="row mt-5">
                <div class="col-sm-12 text-center">
                    <h1 class="main-title mb-4">Select Template</h1>
                </div>                
                <div class="col-sm-4">
                    <img src="/img/templae-sample-1.png">
                </div>
                <div class="col-sm-4">
                    <img src="/img/templae-sample-2.png">
                </div>
                <div class="col-sm-4">
                    <img src="/img/templae-sample-3.png">
                </div>
                </div>

                <div class="row mt-5 ">
                    <div class="col-sm-12 text-center"><h2 class="main-title">Grab Your .com</h2></div>
                    <div class="col-sm-12">
                    <div class="input-group justify-content-center">
                <input type="text" class="form-control" placeholder="williamson.com">
                <div class="input-group-append">
                    <button class="primary" type="button">
                        Search <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
                    </div>
                </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
