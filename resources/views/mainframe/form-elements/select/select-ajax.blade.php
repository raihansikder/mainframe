<?php
/**
 * @var array $var                  A temporary variable, that is set only to render the view partial. Usually this view
 *                 file is included inside a form.
 * @var $errors                     \Illuminate\Support\MessageBag
 * @var $moduleName                string 'aiddeclarations'
 * @var $currentModule                        \App\Module
 * @var $aiddeclaration             \App\Aiddeclaration Object that is being edited
 * @var $element                    string 'aiddeclaration'
 * @var $elementIsEditable           boolean
 * @var $uuid                       string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */

/** Common view parameters for form elements */
$rand = randomString();
$var['container_class'] = $var['container_class'] ?? ''; // container_class: main wrapper div class.
$var['name'] = $var['name'] ?? 'NO_NAME';    // name: Form file input name, this name will be posted when the form is submitted.
$var['params'] = $var['params'] ?? [];     // params: Array of parameters to be passed to Form::select(). Usually this contains all the additional HTML attributes for the HTML input tag. i.e. ]class=>'my_class', id=>'my_id']
$var['params']['class'] = isset($var['params']['class']) ? $var['params']['class'] . ' form-control ajax' : ' form-control ajax'; // ['params']['class']: Enforce a class 'form-control' for the input/select HTML element. 'form-control' is a native class of UI framework.
$var['params']['id'] = $var['params']['id'] ?? $var['name']; // ['params']['class']: Enforce a class 'form-control' for the input/select HTML element. 'form-control' is a native class of UI framework.
$var['value'] = $var['value'] ?? null;        // value: Set the value of the form field. This will override all other values passed or derived from form-model binding or old input values.
$var['label'] = $var['label'] ?? '';        // label: Label of the form field
$var['label_class'] = $var['label_class'] ?? ''; //label_class: class of the label
$var['old_input'] = oldInputValue($var['name'], $var['value']);   // old_input: stores the existing value by computing using oldInputValue() function is the $var['value'] is not given.
if (!isset($var['editable'])) { // Check if the form input/select is editable based on the value of $elementIsEditable. The variable is set in the controller ModuleBaseController and passed to the form view(form.blade.php) while rendering.
    $var['editable'] = !(isset($elementIsEditable) && $elementIsEditable === false);
}

//$var['table'];
$var['name_field'] = $var['name_field'] ?? 'name'; // name_field: Column of the table that will be shown as the readable name of the option for user. Usually this field is a text field. i.e. name, name_ext. Default is 'name'.
$name_field = $var['name_field'];
$var['value_field'] = $var['value_field'] ?? 'id'; // value_field: Column of the table that will be used for the value that will be actually posted. Usually this field is an id field. Default is 'id'.
$value_field = $var['value_field'];

$var['url'] = $var['url'] ?? route($var['table'] . '.list-json'); // URL to get Ajax data as search result

$id = $preload = null;
if ($var['old_input']) {
    $var['value'] = $var['old_input'];
} else if (isset($$element)) {
    $var['value'] = $$element->user_id;
}
if ($var['value']) {
    $item = DB::table($var['table'])->select([$value_field, $name_field])->where($value_field, $var['value'])->first();
    if ($item) $preload = $item->$name_field;
}
?>


<!--suppress ALL -->
<div id="{{$rand}}" class="form-group {{$errors->first($var['name'], ' has-error')}} {{$var['container_class']}}">
    @if(strlen(trim($var['label'])))
        <label id="label_{{$var['name']}}" class="control-label {{$var['label_class']}}" for="{{$var['name']}}">
            {!! $var['label'] !!}
        </label>
    @endif
    @if($var['editable'])
        <input name="preload" type="hidden" value="{{$preload}}"/>
        {{ Form::text($var['name'], $var['old_input'], $var['params']) }}
    @else
            <?php $tmp_name = $var['name']?>
            <span class="{{$var['params']['class']}} readonly">
            @if(isset($$element))
                    {{$$element->$tmp_name}}
                @endif
        </span>
    @endif
    {!! $errors->first($var['name'], '<span class="help-block">:message</span>') !!}
</div>

{{-- Unset the local variable used in this view. --}}


@section('js')
    @parent

    <script type="text/javascript">
        var div_id = '{{$rand}}';
        var url = '{{$var['url']}}';
        var input_name = '{{$var['name']}}';
        initAjaxSelect(div_id, url, input_name);

        /**
         * Function to instantiate the ajax based selector.
         * @param div_id
         * @param url
         * @param input_name
         */
        function initAjaxSelect(div_id, url, input_name) {


            var select2 = $("#" + div_id + " input.ajax").select2({
                minimumInputLength: 2,
                initSelection: function (element, callback) {
                    var id = element.val();
                    var text = $("#" + div_id + ' input[name=preload]').val();
                    var data = {id: id, text: text};
                    callback(data);
                },
                ajax: {
                    dataType: "json",
                    url: url,
                    quietMillis: 1000,
                    data: function (term, page) {
                        return {
                        {{$name_field}}:
                        term
                    }
                        ;
                    },
                    results: function (response) {
                        return {
                            results: $.map(response.data, function (item) {
                                return {
                                    //text: item.id + '. ' + item.{{$name_field}},
                                    text: item.{{$name_field}},
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            }).on("change", function () {
                // callSomeFunction();
            });
        }

    </script>
@endsection

<?php unset($var, $rand, $name_field, $value_field) ?>
