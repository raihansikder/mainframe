<?php
/**
 * This view is likely to be usually used in a module form.
 * For available global variables for form see app/views/spyr/modules/base/form.blade.php
 * @var array $var A temporary variable, that is set only to render the view partial. Usually this view
 *                 file is included inside a form.
 * @var $errors    \Illuminate\Support\MessageBag
 */

/** Common view parameters for form elements */
$var['container_class'] = $var['container_class'] ?? ''; //container_class: main wrapper div class.
$var['name'] = $var['name'] ?? 'NO_NAME';    //name: Form file input name, this name will be posted when the form is submitted.
$var['params'] = $var['params'] ?? [];     //HTML parameters for the hidden input.
$var['params']['class'] = (isset($var['params']['class'])) ? $var['params']['class']." spyr-checkbox-input " : ' spyr-checkbox-input '; //['params']['class']: Enforce a class 'form-control' for the input/select HTML element. 'form-control' is a native class of UI framework.
$var['value'] = $var['value'] ?? '';        //value: Set the value of the form field. This will override all other values passed or derived from form-model binding or old input values.
$var['label'] = $var['label'] ?? '';        //label: Label of the form field
$var['label_class'] = $var['label_class'] ?? ''; //label_class: class of the label
$var['old_input'] = oldInputValue($var['name'],
    $var['value']);     //old_input: stores the existing value by computing using oldInputValue() function is the $var['value'] is not given.
if (! isset($var['editable'])) { // Check if the form input/select is editable based on the value of $elementIsEditable. The variable is set in the controller ModuleBaseController and passed to the form view(form.blade.php) while rendering.
    if ((isset($elementIsEditable) && $elementIsEditable == false)) {
        $var['editable'] = false;
    } else {
        $var['editable'] = true;
    }
}

/** Custom parameters */
$var['id'] = $var['id'] ?? $var['name'];       //The html for the check box is not rendered using existing Form:: functions so the parameters(id, class) must be provided separately.
$var['class'] = $var['class'] ?? '';
$var['option'] = $var['option'] ?? '1';  //Option for the checkbox. Default is 'Yes'.
$var['checked_val'] = $var['checked_val'] ?? '1';  //Option for the checkbox. Default is 'Yes'.
$var['unchecked_val'] = $var['unchecked_val'] ?? '0';  //Option for the checkbox. Default is 'Yes'.
$var['disabled'] = ($var['editable'] == false) ? 'disabled' : '';   //Flag to store the HTML 'disable' attribute based on editibility.
?>

{{-- HTML for the checkbox block --}}
<div class="form-group {{$errors->first($var['name'], ' has-error')}} {{$var['container_class']}}">

    <input data-checkbox="{{$var['name']}}" name="checkbox_{{$var['name']}}" type="checkbox" value="{{$var['option']}}"
           data-checked-val="{{$var['checked_val']}}"
           data-unchecked-val="{{$var['unchecked_val']}}"
           id="{{$var['id']}}"
           class="{{$var['class']}} spyr-checkbox"
            {{$var['disabled']}}/>
    @if(strlen(trim($var['label'])))
        <label id="label_{{$var['name']}}" class="control-label {{$var['label_class']}}" for="{{$var['name']}}">
            {!! $var['label'] !!}
        </label>
    @endif
    {{ Form::hidden($var['name'], $var['old_input'], $var['params']) }}
    {!! $errors->first($var['name'], '<span class="help-block">:message</span>') !!}

</div>

{{-- Unset the local variable used in this view. --}}
<?php unset($var) ?>
{{-- initCheckbox(); js function is responsible to copy the selection of checkbox in the hidden input value--}}
{{-- spyr-checkbox-input class must be added in checkbox to enable initCheckbox90--}}
