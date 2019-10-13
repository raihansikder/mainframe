<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'groups'
 * @var $mod                   Module
 * @var $group                 Group Object that is being edited
 * @var $element               string 'group'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

{{-- Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.input-text',['var'=>['name'=>'name','label'=>'Name', 'container_class'=>'col-sm-3']])
@include('form.input-text',['var'=>['name'=>'title','label'=>'Title', 'container_class'=>'col-sm-3']])
@include('form.is_active')
<div class="clearfix"></div>
@if(isset($$element))
    <h4>Permissions</h4>
    <div id="vue_root_permission" class="permissions-tree">
        <ul>
            <li><label>
                    <input name='permission[]' type='checkbox' v-model='permission' value='superuser'
                           data-toggle="tooltip" title="Assign super admin permission"/>
                    <b>Super user</b>
                </label>
            </li>
            <li>{{renderModulePermissionTree(\App\Modulegroup::tree()) }}</li>
            @include('modules.groups.permission-blocks')
        </ul>
    </div>
@endif
{{-- Form ends --}}

{{-- JS starts: javascript codes go here.--}}
@section('js')
    @parent
    <script type="text/javascript">
        @if(!isset($$element))
        /*******************************************************************/
        // Creating :
        // this is a place holder to write  the javascript codes
        // during creation of an element. As this stage $$element or $group(module
        // name singular) is not set, also there is no id is created
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();
        @elseif(isset($$element))
        /*******************************************************************/
        // Updating :
        // this is a place holder to write  the javascript codes that will run
        // while updating an element that has been already created.
        // during update the variable $$element or $group(module
        // name singular) is set, and id like other attributes of the element can be
        // accessed by calling $$element->id, also $group->id
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();
        enableCascadingSelectionOfPermission();
        @endif


        /*******************************************************************/
        // Saving :
        // Saving covers both creating and updating (Similar to Eloquent model event)
        // However, it is not guaranteed $$element is set. So the code here should
        // be functional for both case where an element is being created or already
        // created. This is a good place for writing validation
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();

        /*******************************************************************/
        // frontend and Ajax hybrid validation
        /*******************************************************************/
        addValidationRulesForSaving(); // Assign validation classes/rules
        enableValidation('{{$module_name}}'); // Instantiate validation function

        /*******************************************************************/
        // List of functions
        /*******************************************************************/

        // Assigns validation rules during saving (both creating and updating)
        function addValidationRulesForSaving() {
            $('input[name=name]').addClass('validate[required]');
        }

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
                        @if(isset($$element))
                        url: '{{route('groups.show',$$element->id)}}?ret=json',
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
{{-- JS ends --}}