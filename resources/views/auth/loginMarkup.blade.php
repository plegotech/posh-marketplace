@extends('layouts.app')

@section('content')
<div class="login-area">
    <div class="container top-log">
        <div class="row">
            <div class="col-sm-12">
                    <div class="logo">
                        <h1>Posh Marketplace</h1>
                    </div>
                    <div class="login-box">
                        <h1>Sign-In</h1>
                        <form action="">
                            <input type="email" placeholder="Email Address*" >
                            <input type="password" placeholder="Password*" >
                            <label class="group">
                                <input type="checkbox"> 
                                Stay Signed In
                            </label>
                            
                            <a href="">Forgot Password?</a>
                            <input type="button" value="LOGIN">
                        </form>
                    </div>
                    <div class="info-login">
                        <h2>New to Posh Market?</h2>
                        <ul>
                            <li><a href="">Vendor Signup</a></li>
                            <li><a href="">Seller Signup</a></li>
                            <li><a href="">User Signup</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bottom-log">
        <div class="row">
            <div class="col-sm-12">
                <p>Copyright © 2021 Posh Market, Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>

@endsection
