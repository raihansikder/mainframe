<?php
/**
 * @var array $var A temporary variable, that is set only to render the view partial. Usually this view
 *                 file is included inside a form.
 * @var $errors    \Illuminate\Support\MessageBag
 * @var Illuminate\Database\Query\Builder $query
 */

/** Common view parameters for form elements For details of the fields see app/views/spyr/form/input-text.blade.php */
$var['container_class'] = $var['container_class'] ?? 'col-md-3';
$var['name'] = $var['name'] ?? 'NO_NAME';
$var['params'] = $var['params'] ?? [];
$var['params']['class'] = (isset($var['params']['class'])) ? $var['params']['class'] . " form-control " : ' form-control ';
$var['value'] = $var['value'] ?? '';
$var['label'] = $var['label'] ?? '';
$var['label_class'] = $var['label_class'] ?? '';
$var['blank_select'] = $var['blank_select'] ?? 'Select';
$var['old_input'] = oldInputValue($var['name'], $var['value']);
$var['cache_time'] = $var['cache_time'] ?? 'short';

if (!isset($var['editable'])) {
    $var['editable'] = !(isset($element_editable) && $element_editable == false);
}
if ($var['editable'] == false) $var['params']['disabled'] = true;

/** Custom parameters */
$var['multiple'] = (in_array('multiple', $var['params'])) ? true : false; // multiple: Store a flag if multiple selection is provided $var['params']

/** Query construction */
$query = $var['query'] ?? DB::table($var['table']);
$var['name_field'] = $var['name_field'] ?? 'name'; // name_field: Column of the table that will be shown as the readable name of the option for user. Usually this field is a text field. i.e. name, name_ext. Default is 'name'.
$var['value_field'] = $var['value_field'] ?? 'id'; // value_field: Column of the table that will be used for the value that will be actually posted. Usually this field is an id field. Default is 'id'.

/**
 * Query for getting the options from database
 **************************************************/
/** @var  $query \Illuminate\Database\Query\Builder */
$query = $query->whereNull('deleted_at')->where('is_active', 1);
if (userTenantId() && tableHasColumn($var['table'], tenantIdField())) {
    $query = $query->where(tenantIdField(), userTenantId());
}
$options = $query->pluck($var['name_field'], $var['value_field'])->toArray();

# Push an empty select option on top
if (!$var['multiple']) {
  $options = array_prepend($options, $var['blank_select'], 0 );
}
/*************************************************/
?>

{{-- HTML for the input/select block --}}
<div class="form-group {{$errors->first($var['name'], ' has-error')}} {{$var['container_class']}}">
    @if(strlen(trim($var['label'])))
        <label id="label_{{$var['name']}}" class="control-label {{$var['label_class']}}"
               for="{{$var['name']}}">{!! $var['label'] !!}
        </label>
    @endif
    <?php $var['select_name'] = ($var['multiple']) ? $var['name'] . "[]" : $var['name']; ?>
    {{ Form::select($var['select_name'], $options, $var['old_input'], $var['params']) }}
    {!! $errors->first($var['name'], '<span class="help-block">:message</span>')  !!}

</div>


{{-- Unset the local variable used in this view. --}}
<?php unset($var, $pairs, $options, $query) ?>