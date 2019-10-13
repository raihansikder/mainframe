<?php
/** @noinspection PhpUndefinedMethodInspection */
$user = $user ?? user();
?>

<div class="col-sm-6 mb-2"><a class="btn btn-primary" data-toggle="collapse" href="#editname" role="button" aria-expanded="false"
                              aria-controls="editname">Edit Name <i class="fa fa-pencil-square-o pull-right"></i> </a>
    <div class="collapse" id="editname">
        <div class="card card-body">
            <form class="col-md-12" action="{{route('users.update',[$user->id])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group pt-0">
                    <input name="first_name" class="form-control" type="text" value="{{$user->first_name}}">
                </div>
                <div class="form-group pt-0">
                    <input name="last_name" class="form-control" type="text" value="{{$user->last_name}}">
                </div>
                <div class="update-btn">
                    <input type="hidden" name="redirect_success" value="{{URL::full()}}"/>
                    <input type="hidden" name="redirect_fail" value="{{URL::full()}}"/>
                    <button type="submit" class="btn btn-primary"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@section('js')
    @parent
    {{-- Write custom JS here --}}
@stop