<?php
/**
 * @var array $var A temporary variable, that is set only to render the view partial. Usually this view
 *                 file is included inside a form.
 * @var $errors \Illuminate\Support\MessageBag
 */

/** Common view parameters for form elements */
$var['container_class'] = isset($var['container_class']) ? $var['container_class'] : ''; // container_class: main wrapper div class.
$var['name'] = isset($var['name']) ? $var['name'] : 'NO_NAME';    // name: Form file input name, this name will be posted when the form is submitted.
$var['params'] = isset($var['params']) ? $var['params'] : [];     // params: Array of parameters to be passed to Form::select(). Usually this contains all the additional HTML attributes for the HTML input tag. i.e. ]class=>'my_class', id=>'my_id']
$var['params']['class'] = isset($var['params']['class']) ? $var['params']['class'] . " form-control " : ' form-control '; // ['params']['class']: Enforce a class 'form-control' for the input/select HTML element. 'form-control' is a native class of UI framework.
$var['value'] = isset($var['value']) ? $var['value'] : '';        // value: Set the value of the form field. This will override all other values passed or derived from form-model binding or old input values.
// $var['label'] = isset($var['label']) ? $var['label'] : '';        // label: Label of the form field
// $var['label_class'] = isset($var['label_class']) ? $var['label_class'] : ''; //label_class: class of the label
$var['old_input'] = oldInputValue($var['name'], $var['value']);   // old_input: stores the existing value by computing using oldInputValue() function is the $var['value'] is not given.
// if (!isset($var['editable'])) { // Check if the form input/select is editable based on the value of $element_editable. The variable is set in the controller ModulebaseController and passed to the form view(form.blade.php) while rendering.
//     $var['editable'] = (isset($element_editable) && $element_editable == false) ? false : true;
// }

/** Custom parameters */
//$var['type'] = isset($var['type']) ? $var['type'] : 'text';       // type: Defines what type of input it is for text type input. type can be 'text' or 'password'.
?>


<div class="{{$var['container_class']}}">
    {{ Form::hidden($var['name'], $var['old_input'], $var['params']) }}
</div>

{{-- Unset the local variable used in this view. --}}
<?php unset($var) ?>