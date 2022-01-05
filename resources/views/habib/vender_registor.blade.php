@extends('layouts.app')

@section('content')

<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posh Admin Section</title>
</head>

<body>
<div class="main">
 <div class="wrapper">
	<!-- START: REGISTRATION SCREEN -->
	<section class="registration-screen" id="registration-dvs">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary-posh-m text-white ">
                <div class="bgp-card-bx">
                    <div class="card-body">
                        <p class="mb-1 ">Welcome To</p>
                        <h2>Posh Marketplace</h2>
                    </div>
					<div class="footer-copyright"><p>Copyright © 2021 Posh Market, Inc. All rights reserved.</p></div>
                </div>
            </div>
            <div class="col-md-8 py-5 bg-white">
			<div class="registration-dvs-form text-center">
                <h3 class="pb-1 txt-blue">Create Account</h3>
				<p class="txt-gray regis-subtitle">Enter your details below to continue</p>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="First Name" name="First Name" placeholder="First Name*" class="form-control" type="text">
                        </div>
						<div class="form-group col-md-6">
                          <input id="Last Name" name="Last Name " placeholder="Last Name*" class="form-control" type="text">
                        </div>
						<div class="form-group col-md-12">
                          <input id="Address" name="Address " placeholder="Address*" class="form-control" type="text">
                        </div>
						<div class="form-group col-md-6">
                          <input id="City" name="City " placeholder="City*" class="form-control" type="text">
                        </div>
						<div class="form-group col-md-6">
                                  
                                  <select id="inputState" class="form-control">
                                    <option selected>State*</option>
                                    <option> New Buyer</option>
                                    <option> Auction</option>
                                    <option> Complaint</option>
                                    <option> Feedback</option>
                                  </select>
                        </div>
						<div class="form-group col-md-6">
                          <input id="Phone Number" name="Phone Number " placeholder="Phone Number*" class="form-control" type="text">
                        </div>
						<div class="form-group col-md-6">
                          <input id="Company Name" name="Company Name " placeholder="Company Name" class="form-control" type="text">
                        </div>
						<div class="form-group col-md-6">
                          <input id="Subscription Fees" name="Subscription Fees" placeholder="Subscription Fees*" class="form-control" type="text">
                        </div>
						<div class="form-group col-md-6">
                          <input id="Email Address" name="Email Address" placeholder="Email Address*" class="form-control" type="email">
                        </div>
						<div class="form-group col-md-6">
                          <input id="Password" name="Password" placeholder="Password*" class="form-control" type="password">
                        </div>
						<div class="form-group col-md-6">
                          <input id="Confirm Password" name="Confirm Password" placeholder="Confirm Password*" class="form-control" type="password">
                        </div>
						</div>
                   <div class="form-row text-center sub-btn-bx">
                        <button type="button" class="primary rsv-bx"><strong>REGISTER</strong></button>
						<p class="mt-3 mb-1">Already Have an account?</p>
						<a href="" class="link-b-b"><strong>Sign-In</strong></a>
                    </div>
                </form>
				</div>
            </div>
        </div>
    </div>
</section>
	<!-- END::  REGISTRATION SCREEN -->
 </div>
</div>
<style>
select#inputState {
    -webkit-appearance: none;
    -moz-appearance: none;
    background: transparent;
    background-image: url(img/down-arrow-Vector.png);
    background-repeat: no-repeat;
    background-position-x: 94%;
    background-position-y: 50%;
}
button.primary.rsv-bx {
    box-shadow: 0px 8px 22px rgb(0 0 0 / 10%);
    height: 50px;
}
.footer-copyright p {
    font-size: 14px;
    text-align: center;
}
.bg-primary-posh-m:after {
    background: url(img/E-payment.png);
    content: "";
    height: 250px;
    width: 170px;
    position: absolute;
    bottom: 139px;
    left: 0;
    background-size: contain;
}
.bg-primary-posh-m:before {
    background: url(img/Shopping.png);
    content: "";
    height: 207px;
    width: 285px;
    position: absolute;
    top: 0px;
    right: 0;
    background-size: contain;
}
.bgp-card-bx {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 100%;
}
.bg-primary-posh-m {
    background-color: #0862A3;
}
.txt-gray{color:666666}
.txt-blue{color:0862A3}
a.link-b-b {
    font-size: 20px;
    font-weight: 600;
}
.form-row.sub-btn-bx {
    max-width: 440px;
    margin: 0 auto;
    justify-content: center;
    flex-direction: column;
	padding-bottom: 80px
}
.registration-dvs-form input, .registration-dvs-form select {
    height: 56px!important;
    margin-top: 0;
    background: #fff;
    border-color: #2D2D2D;
}
.registration-dvs-form {
    padding-right: 18%;
    margin: 0 auto;
    padding-left: 18%;
}
</style>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>

@endsection