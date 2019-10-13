@extends('shop.template.auth.layout')

@section('css')
    @parent
    {{-- Write custom CSS here --}}
    <style>
        .help-block {
            color: black;
        }
    </style>
@stop

@section('content')
    <div class="justify-content-center align-items-center d-flex login-register">
        <div class="login-wrap my-5 ">
            <div class="form-logo">
                <a href="{{route('shop.index')}}"><img src="{{asset('letsbab/shop/images/logo2.png')}}" alt=""></a>
            </div>
            @include('template.include.messages-top')
            <form id="login-form" class="form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating" for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class='help-block'>{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group bmd-form-group mb-4">
                    <label class="bmd-label-floating" for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class='help-block'>{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="row form-group mb-4">
                    <div class="col">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember-me">
                            <label class="custom-control-label" for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <div class="col text-right"><a href="{{route('shop.password.request')}}"><strong> Forgot Password?</strong></a></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
                <div class="form-group regbtn">
                    <p>Don’t have an account?</p>
                    <a class="btn btn-primary btn-block" href="{{route('shop.register')}}">Sign up</a></div>
            </form>
            @include('shop.template.include.social-sign-in')
        </div>
    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop
