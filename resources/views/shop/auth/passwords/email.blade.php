@extends('shop.template.auth.layout')

@section('css')
    @parent
    {{-- Write custom CSS here --}}
    <style>
        .help-block {
            color: black;
        }
        .signbtn{
            text-align: center;
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
            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                <div class="form-group bmd-form-group mb-4">
                    <label class="bmd-label-floating" for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class='help-block'>{{ $errors->first('email') }}</span>
                    @endif
                </div>

                {{--                    <div class="form-group row">--}}
                {{--                        <label for="email"--}}
                {{--                               class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                {{--                        <div class="col-md-12">--}}
                {{--                            <input id="email" type="email"--}}
                {{--                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
                {{--                                   name="email" value="{{ old('email') }}" required>--}}

                {{--                            @if ($errors->has('email'))--}}
                {{--                                <span class="invalid-feedback" role="alert">--}}
                {{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
                {{--                                    </span>--}}
                {{--                            @endif--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <div class="form-group row mb-0">--}}
                {{--                        <div class="col-md-12 offset-md-4">--}}
                {{--                            <button type="submit" class="btn btn-primary">--}}
                {{--                                {{ __('Send Password Reset Link') }}--}}
                {{--                            </button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">{{ __('Submit') }}</button>
                </div>
                <div class="form-group mb-4 signbtn">
                    <p class="">Back to <a class="" href="{{route('shop.login')}}"><b>{{ __('Sign in') }}</b></a></p>
                </div>
            </form>
            {{--            @include('shop.template.include.social-sign-in')--}}
        </div>
    </div>
@stop

@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop
