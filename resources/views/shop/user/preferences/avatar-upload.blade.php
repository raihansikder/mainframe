<?php
use App\Module;$user = $user ?? user();

/** @noinspection PhpUndefinedMethodInspection */
$module = Module::where('name', 'users')->remember(cacheTime('long'))->first();
$avatar_upload = $user->avatar();
?>


<div class="col-sm-6 mb-2"><a class="btn btn-primary" data-toggle="collapse" href="#editpic" role="button" aria-expanded="false"
                              aria-controls="editpic"> Edit Profile Picture <i class="fa fa-pencil-square-o pull-right"></i> </a>
    <div class="collapse" id="editpic">
        <div class="card card-body">
            <form id="form_avatar_upload" action="{{route('uploads.store')}}" method="post" enctype="multipart/form-data">
                <div class="profile-image">
                    <?php
                    $avatar = $user->avatar ?? asset('letsbab/shop/images/profile/profile-palceholder.png');
                    ?>
                    <img src="{{$avatar}}" class="rounded-circle" alt="{{$user->id}}"></div>
                <ul>
                    <li><a href="#"><i class="fa fa-file-image-o" aria-hidden="true"></i> Change Image</a> <input type="file" name="file" id="file"/></li>

                    @if($avatar_upload)
                        <li>
                            <a href="#" id="{{$avatar_upload->id}}" class="delete_avatar_btn"
                               data-delete_url="{{route('uploads.destroy',[$avatar_upload->id])}}">
                                <i class="fa fa-trash-o"></i>Delete Image
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="update-btn">
                    {{csrf_field()}}

                    <input type="hidden" name="type" value="Avatar"/>
                    {{-- <input type="hidden" name="ret" value="json"/>--}}
                    {{-- <input type="hidden" name="tenant_id" value="{{$var['tenant_id']}}"/>--}}
                    <input type="hidden" name="module_id" value="{{$module->id}}"/>
                    <input type="hidden" name="element_id" value="{{$user->id}}"/>
                    <input type="hidden" name="element_uuid" value="{{$user->uuid}}"/>
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
    <script>

        $(".delete_avatar_btn").click(function () {
            // var upload_id = $(this).attr('id');
            var delete_url = $(this).data('delete_url');
            $.ajax({
                url: delete_url,
                datatype: 'json',
                method: "POST",
                data: {
                    _method: 'DELETE',
                    _token: '{{csrf_token()}}',
                    ret: 'json',
                    redirect_success: '{{URL::full()}}',
                    redirect_fail: '{{URL::full()}}',
                },
                success: function (response) {
                    if (response.status === 'success') {
                        alert('Avatar has been deleted');
                        window.location.replace(response.redirect);
                    } else {
                        alert(response.status)
                    }
                }
            });
        });

    </script>
@stop