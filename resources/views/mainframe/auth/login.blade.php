@extends('mainframe.layouts.centered.template')

@section('content')
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <input name="loginRedirect" type="hidden" value="{{Request::get('loginRedirect')}}"/>

            <div class="form-group has-feedback {{ $errors->first('email', 'has-error') }}">
                <input name="email" type="text" class="form-control" placeholder="Username (Email Address)">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class='help-block'>{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->first('password', 'has-error') }}">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class='help-block'>{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-4">
                    <button type="submit" class="btn btn-success btn-block lb-bg login">
                        {{ __('Login') }}
                    </button>
                    <div class="col-md-12 text-center" style="margin: 15px 0">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <a class="btn btn-default btn-block" target="_blank"
                       href="{{route('register')}}">{{ __('Register') }}</a>
                </div>
            </div>
        </form>
    </div>
@endsection
