<?php
/** @noinspection PhpUndefinedMethodInspection */
$user = $user ?? user();
?>
<a data-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">Email <i
            class="fa fa-angle-right"></i></a>
<div class="collapse" id="email">
    <div class="card card-body mb-3">
        <form name="form_update_email" id="form_update_email" class="col-md-12" action="{{route('post.change-email')}}" method="post">
            @csrf
            <h3 class="mb-3">Change Email</h3>
            <div class="row">
                {{--<div class="col-sm-12">--}}
                    {{--<div class="form-group bmd-form-group">--}}
                        {{--<label class="bmd-label-floating" for="password">Current password</label>--}}
                        {{--<input type="password" name="password" id="password" class="form-control  validate[required]">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-sm-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="password">Current Email</label>
                        <input type="email" name="email" id="email" class="form-control" readonly="readonly" value="{{$user->email}}">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="new_email">New Email</label>
                        <input type="text" name="new_email" id="new_email" class="form-control validate[required,custom[email]]">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating" for="new_email_confirmation">Confirm Email</label>
                        <input type="text" name="confirm_new_email" id="confirm_new_email" class="form-control validate[equals[new_email]]">
                    </div>
                </div>
            </div>
            <div class="update-btn">
                <input type="hidden" name="email" value="{{$user->email}}"/>
                <button type="submit" class="btn btn-primary"> Update</button>
            </div>
        </form>
    </div>
</div>


@section('js')
    @parent
    <script>
        $('#form_update_email').validationEngine();
    </script>
@stop