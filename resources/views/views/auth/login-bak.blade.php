@extends('template.auth-frame')

@section('content')
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <input name="loginRedirect" type="hidden" value="{{Request::get('loginRedirect')}}"/>

            <div class="form-group has-feedback {{ $errors->first('email', 'has-error') }}">
                <input name="email" type="text" class="form-control" placeholder="Username">
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


            {{--<div class="form-group row">--}}
            {{--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

            {{--<div class="col-md-6">--}}
            {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

            {{--@if ($errors->has('email'))--}}
            {{--<span class="invalid-feedback" role="alert">--}}
            {{--<strong>{{ $errors->first('email') }}</strong>--}}
            {{--</span>--}}
            {{--@endif--}}
            {{----}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group row">--}}
            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

            {{--<div class="col-md-6">--}}
            {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

            {{--@if ($errors->has('password'))--}}
            {{--<span class="invalid-feedback" role="alert">--}}
            {{--<strong>{{ $errors->first('password') }}</strong>--}}
            {{--</span>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--</div>--}}

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
                    <button type="submit" class="btn btn-primary btn-block lb-bg">
                        {{ __('Login') }}
                    </button>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    {{--<a href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                    <hr/>
                    <a class="btn btn-default btn-block" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            </div>
        </form>
    </div>
@endsection
