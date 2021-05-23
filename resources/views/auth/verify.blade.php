@extends('mainframe.layouts.centered.template')

@section('content')

    <h4>Email verification required</h4>

    <div class="card-body">

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                A fresh verification link has been sent to your email address.
            </div>
        @else
            Before proceeding, please check your email for a verification link.
            If you did not receive the email click below.

            <form action="{{ route('verification.resend') }}" method="post">
                {{csrf_field()}}
                <button type="submit">Resend verification link</button>
            </form>
        @endif

    </div>

@endsection

