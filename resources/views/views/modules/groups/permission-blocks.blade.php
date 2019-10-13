<?php
$permissions = conf('permissions');
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