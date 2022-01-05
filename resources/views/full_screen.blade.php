@extends('layouts.app')

@section('content')
    <div class="login-area">
        <div class="container top-log">
            <div class="row">
                <router-view></router-view>
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
