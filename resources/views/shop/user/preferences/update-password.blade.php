<?php
/** @noinspection PhpUndefinedMethodInspection */
$user = $user ?? user();
?>

<a data-toggle="collapse" href="#password" role="button" aria-expanded="false" aria-controls="password">Password
    <i class="fa fa-angle-right"></i></a>
<div class="collapse" id="password">
    <div class="card card-body mb-3">
        <form name="form_update_password" id="form_update_password" class="col-md-12" action="{{route('users.update',[$user->id])}}" method="post">
            @csrf
            @method('PATCH')
            <h3 class="mb-3">Change Password</h3>
            <div class="row">
                {{--<div class="col-sm-4">--}}
                    {{--<div class="form-group bmd-form-group">--}}
                        {{--<label class="bmd-label-floating" for="current-password">Current Password</label>--}}
                        {{--<input type="text" name="current-password" id="current-password" class="form-control">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-sm-4">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="password">Current Password</label>
                        <input type="password" name="current-password" id="current-password" class="form-control validate[required]">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control validate[required]">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
            <div class="update-btn">
                <button type="submit" class="btn btn-primary"> Update</button>
            </div>
        </form>
    </div>
</div>


@section('js')
    @parent
    <script>
        $('#form_update_password').validationEngine();
    </script>
@stop