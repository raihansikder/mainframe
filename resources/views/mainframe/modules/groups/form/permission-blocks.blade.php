<?php
$permissions = conf('mainframe.permissions');
?>
@foreach($permissions as $block_title=>$entries)
    <div class="clearfix"></div>
    <li class="pull-left">
        <input name="permission[]" type="checkbox" value="{{$block_title}}" v-model='permission' v-on:click='clicked'>
        <label> {{$block_title}} </label>

        <div class="clearfix"></div>
        <ul class="pull-left">
            @foreach($entries as $entry)
                <li>
                    <input name="permission[]" type="checkbox" value="{{$entry['permission']}}" v-model='permission'>
                    <label>{{$entry['label']}}<code>
                            <small>{{$entry['permission']}}</small>
                        </code>
                    </label>
                </li>
            @endforeach
        </ul>
    </li>
@endforeach


@section('js')
    @parent
    <script>
        enableCascadingSelectionOfPermission();

        // Function to enable cascading selection/de-selction of child elements in a permission hiararchy
        function enableCascadingSelectionOfPermission() {
            var v = new Vue({
                el: '#vue_root_permission',
                data: {
                    permission: []
                },
                mounted: function () {
                    // get groups permissions and load in vue data array
                    $.ajax({
                        datatype: 'json',
                        method: "GET",
                        @if(isset($element->id))
                        url: '{{route('groups.show',$element->id)}}?ret=json',
                        @endif
                        // data: $('form[name=' + form_name + ']').serialize()
                    }).done(function (ret) {
                        ret = parseJson(ret);
                        var arr = [];
                        if (hasNestedKey(ret, 'data', 'permissions')) {
                            $.each(ret.data.permissions, function (k, v) {
                                arr.push(k)
                            });
                        }
                        v.permission = arr;
                    });
                },
                methods: {
                    clicked: function (e) {
                        // if checkbox is checked then push all the relevant values in array
                        // e.target returns the dom element that has been clicked
                        if ($(e.target).is(":checked")) {
                            $(e.target).parent().find('input').each(function (e) {
                                var val = $(this).val();
                                // check if the value already exists in array. Don't push into array
                                // if the key already exists
                                if (v.permission.indexOf(val) === -1) { // if doesn't exist in array index
                                    v.permission.push(val);
                                }
                            });
                        } else {
                            $(e.target).parent().find('input').each(function (e) {
                                var val = $(this).val();
                                var index = v.permission.indexOf(val);
                                if (index > -1) {
                                    v.permission.splice(index, 1);
                                }
                            });
                        }
                    }
                }
            });
            return v;
        }

    </script>
@stop