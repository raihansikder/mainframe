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
        <div class="login-wrap  my-5">
            <div class="form-logo">
                <a href="{{route('shop.index')}}"><img src="{{asset('letsbab/shop/images/logo2.png')}}" alt=""></a>
            </div>
            @include('template.include.messages-top')

            {{ Form::open(['route' => 'register','class'=>"registration-form",'id'=>"registration-form", 'name'=>'registration_form', 'files'=>true]) }}
            @csrf
            <input name="group_id" type="hidden" value="8"/>
            <input name="signup_source" type="hidden" value="web"/>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="first_name">First Name:</label>
                {{ Form::text('first_name', Request::old('first_name'), ['class'=>'form-control']) }}
                @if ($errors->has('first_name'))
                    <span class='help-block'>{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="last_name">Last Name:</label>
                {{ Form::text('last_name', Request::old('last_name'), ['class'=>'form-control']) }}
                @if ($errors->has('last_name'))
                    <span class='help-block'>{{ $errors->first('last_name') }}</span>
                @endif
            </div>

            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="email">Email:</label>
                {{ Form::text('email', Request::old('email'), ['class'=>'form-control']) }}
                @if ($errors->has('email'))
                    <span class='help-block'>{{ $errors->first('email') }}</span>
                @endif
            </div>

            <?php

            /** @noinspection PhpUndefinedMethodInspection */

            $countries = App\Country::select(['id', 'name'])->where('is_active', 1)->orderBy('code')->remember(cacheTime('long'))->get()->toArray();
            $options[''] = 'Select';
            foreach ($countries as $country) {
                $options[$country['id']] = $country['name'];
            }
            ?>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="country">Country:</label>
                {{-- @include('form.select-model',['var'=>['name'=>'country_id','label'=>'', 'table'=>'countries', 'container_class'=>'col-sm-12 no-padding']])--}}
                @include('form.select-array',['var'=>['name'=>'country_id','label'=>'', 'options'=>$options, 'container_class'=>'col-sm-12 no-padding']])
            </div>
            <div class='clearfix'></div>

            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="password">Password:
                    <small>( Min 6 characters, a mix of letters and numbers )</small>
                </label>
                {{ Form::password('password',  ['class'=>'form-control']) }}
                {{--<span class="bmd-help" style="display:block">Min 6 characters, a mix of letters and numbers</span>--}}
                <div class='clearfix'></div>
                @if ($errors->has('password'))
                    <span class='help-block'>{{ $errors->first('password') }}</span>
                @endif
            </div>


            <div class="form-group bmd-form-group mb-5">
                <label class="bmd-label-floating" for="password">Confirm password:</label>
                {{ Form::password('password_confirmation',  ['class'=>'form-control']) }}
                <div class='clearfix'></div>
                @if ($errors->has('password_confirmation'))
                    <span class='help-block'>{{ $errors->first('password') }}</span>
                @endif
            </div>


            <div class="row form-group mb-4">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="validate[required] custom-control-input" id="terms" name="terms">
                        <label class="custom-control-label" for="terms">You accept the LetsBab User Terms of Use</label>
                    </div>
                </div>

            </div>
            <div class="form-group">
                {{ Form::hidden('redirect_success', route('shop.login')) }}
                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
            </div>
            <div class="form-group regbtn">
                <p class="text-center">Have an account? <a href="{{route('shop.login')}}">Sign in</a></p>
            </div>
            {{ Form::close() }}
            @include('shop.template.include.social-sign-in')
        </div>
    </div>
@stop
@section('js')
    @parent
    <script type="text/javascript">
        $("#registration-form").validationEngine({
            custom_error_messages: {
                '#terms': {
                    'required': {
                        'message': "You must accept the terms."
                    }
                }
            }
        });
    </script>
@stop
