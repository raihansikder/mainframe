@extends('mainframe.layouts.centered.template')

@section('content')

    <h4>Password reset</h4>

    <div class="card-body">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                A password link has been sent to your email address.
            </div>
        @endif


        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            @include('form.input.text',['var'=>['name'=>'email','label'=>'Email', 'div'=>'col-sm-12']])

            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection





