<?php
/**
 * @var array $var A temporary variable, that is set only to render the view partial. Usually this view
 *                 file is included inside a form.
 * @var $errors    \Illuminate\Support\MessageBag
 */

/** Common view parameters for form elements */
$var['container_class'] = $var['container_class'] ?? 'col-md-3'; // container_class: main wrapper div class.
$var['name'] = $var['name'] ?? 'NO_NAME';    // name: Form file input name, this name will be posted when the form is submitted.
$var['params'] = $var['params'] ?? [];     // params: Array of parameters to be passed to Form::select(). Usually this contains all the additional HTML attributes for the HTML input tag. i.e. ]class=>'my_class', id=>'my_id']
$var['params']['class'] = isset($var['params']['class']) ? $var['params']['class'].' form-control ' : ' form-control '; // ['params']['class']: Enforce a class 'form-control' for the input/select HTML element. 'form-control' is a native class of UI framework.
//$var['params']['id'] = isset($var['params']['id']) ? $var['params']['id'] : $var['name']; // ['params']['class']: Enforce a class 'form-control' for the input/select HTML element. 'form-control' is a native class of UI framework.
$var['value'] = $var['value'] ?? '';        // value: Set the value of the form field. This will override all other values passed or derived from form-model binding or old input values.
$var['label'] = $var['label'] ?? '';        // label: Label of the form field
$var['label_class'] = $var['label_class'] ?? ''; //label_class: class of the label
$var['old_input'] = oldInputValue($var['name'],
    $var['value']);   // old_input: stores the existing value by computing using oldInputValue() function is the $var['value'] is not given.
if (! isset($var['editable'])) { // Check if the form input/select is editable based on the value of $elementIsEditable. The variable is set in the controller ModuleBaseController and passed to the form view(form.blade.php) while rendering.
    $var['editable'] = ! (isset($elementIsEditable) && $elementIsEditable == false);
}

/** Custom parameters */
$var['type'] = $var['type'] ?? 'text';       // type: Defines what type of input it is for text type input. type can be 'text' or 'password'.
?>


<div class="form-group {{$errors->first($var['name'], ' has-error')}} {{$var['container_class']}}">
    @if(strlen(trim($var['label'])))
        <label id="label_{{$var['name']}}" class="control-label {{$var['label_class']}}" for="{{$var['name']}}">
            {!! $var['label'] !!}
        </label>
    @endif

    @if($var['editable'])
        @if($var['type'] === 'password')
            {{ Form::password($var['name'], $var['params']) }}
        @else
            {{ Form::text($var['name'], $var['old_input'], $var['params']) }}
        @endif
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
<?php unset($var, $tmp_name) ?>