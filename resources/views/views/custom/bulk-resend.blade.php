@extends('template.app-frame')

@section('title')
    Bulk Send Verification email
@endsection

@section('content')

    {{ Form::open(['route' => 'post-bulk-resend','name'=>'form-bulk-resend']) }}

    <div class="alert alert-warning">If no user is selected then verification email will be sent to all users.</div>
    <div class="clearfix"></div>
    <button class="btn btn-default" type="submit">Send Verification</button>

    <table class="table table-borderless table-condensed">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><input type="checkbox" name="user_ids[]" value="{{$user->id}}"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
    {{ Form::close() }}
@endsection