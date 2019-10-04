<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('head')
        {{-- head section --}}
    @show
    @include('mainframe::template.css')
</head>
<body class="hold-transition login-page lb-bg">
<div class="login-box shadow">
    <div class="login-logo">
        <a href="{{route('home')}}">
            {{--            <img style="width: 300px; padding-top: 20px;" src="{{asset("letsbab/images/logo-updated.PNG")}}"--}}
            {{--                 alt="{{config('app.name')}}" title="{{config('app.name')}}"/>--}}
            {{config('app.name')}}
        </a>
    </div>
    <div class="login-box-body">
        @include('mainframe::template.include.messages-top')
        @section('content-top')
            {{-- +++++++++++++++++++ --}}
            {{-- content-top section --}}
            {{-- +++++++++++++++++++ --}}
        @show
        @section('content')
            {{-- +++++++++++++++ --}}
            {{-- content section --}}
            {{-- +++++++++++++++ --}}
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="../../index2.html" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>

            {{--<div class="social-auth-links text-center">--}}
            {{--<p>- OR -</p>--}}
            {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign--}}
            {{--in using--}}
            {{--Facebook</a>--}}
            {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign--}}
            {{--in using--}}
            {{--Google+</a>--}}
            {{--</div>--}}
        <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>
        @show
        @section('content-bottom')
            {{-- ++++++++++++++++++++++ --}}
            {{-- content-bottom section --}}
            {{-- ++++++++++++++++++++++ --}}
        @show
    </div>
</div>

@include('mainframe::template.js')
@section('js')
    {{-- js section   --}}
@show
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
