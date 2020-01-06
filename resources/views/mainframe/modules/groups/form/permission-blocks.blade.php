<!--suppress XmlUnboundNsPrefix, ES6ConvertVarToLetConst -->

<?php
/**
 * Renders a multi-dimensional array of permissions in hiararchical order for assigning permission
 * The $tree can be generated from ModuleGroup::tree()
 *
 * @param $tree  : ModuleGroup::tree()
 * @return string
 */
function renderModulePermissionTree($tree)
{
    $html = '';
    if (is_array($tree)) {
        $html .= "<ul>";
        foreach ($tree as $leaf) {
            // $perm = 'perm-'.$leaf['type'].'-'.$leaf['item']->name;
            $perm = $leaf['item']->name;
            $val = $perm;

            $html .= "<div class='clearfix'></div><li class='pull-left'>".
                "<input name='permission[]' type='checkbox' v-model='permission' value='$val'
				v-on:click='clicked'/>".
                "<label><b>".$leaf['item']->title."</b> - <small>".$leaf['item']->desc."</small></label> <div class='clearfix'></div>";

            if ($leaf['type'] === 'module') {
                $module_default_permissions_suffixes = [
                    'view-list' => 'View grid',
                    'view-details' => 'View details',
                    'create' => 'Create',
                    'edit' => 'Edit',
                    'delete' => 'Delete',
                    'restore' => 'Restore',
                    'change-logs' => 'Access change logs',
                    'report' => 'Report',
                ];

                $html .= "<ul class='pull-left module-permissions'>";
                foreach ($module_default_permissions_suffixes as $k => $v) {
                    $val = "$perm-$k";
                    $html .= "<li>".
                        "<input name='permission[]' type='checkbox' v-model='permission'  value='$val'/>".
                        "<label>".$v."</label>".
                        "</li>";
                }
                $html .= "</ul>";
            }

            if (isset($leaf['children']) && count($leaf['children'])) {
                $html .= renderModulePermissionTree($leaf['children']);
            }
            $html .= "</li>";
        }
        $html .= "</ul>";

        return $html;
    }
}
?>

<h4>Permissions</h4>
<div id="vue_root_permission" class="permissions-tree">
    <ul>

        {{--Super user permission--}}
        <li class="superuser">
            <label>
                <input name='permission[]' type='checkbox' v-model='permission' value='superuser'
                       data-toggle="tooltip" title="Assign super admin permission"/>
                <b>Super user</b>
            </label>
        </li>


        {{-- Module view, create, edit permissions--}}
        <li class="module-permissions">
            {!!  renderModulePermissionTree(\App\Mainframe\Modules\ModuleGroups\ModuleGroup::tree()) !!}
        </li>


        {{--Additional permission options defined in config/mainframe/permissions--}}
        <?php
        $permissions = config('mainframe.permissions');
        ?>
        @foreach($permissions as $block_title=>$entries)
            <div class="clearfix"></div>
            <li class="pull-left">
                <label>
                    <input name="permission[]" type="checkbox" value="{{$block_title}}" v-model='permission' v-on:click='clicked'>
                    {{$block_title}}
                </label>

                <div class="clearfix"></div>
                <ul class="pull-left">
                    @foreach($entries as $entry)
                        <li>
                            <label>
                                <input name="permission[]" type="checkbox" value="{{$entry['permission']}}" v-model='permission'>
                                {{$entry['label']}}<code>
                                    <small>{{$entry['permission']}}</small>
                                </code>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>

@section('js')
    @parent
    <!--suppress JSUnusedLocalSymbols -->
    <script>
        enableCascadingSelectionOfPermission();

        /**
         * Function to enable cascading selection/de-selection of child
         * elements in a permission hierarchy
         */
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