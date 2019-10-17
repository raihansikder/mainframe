<?php
/**
 * @var array $var A temporary variable, that is set only to render the view partial. Usually this view
 *                 file is included inside a form.
 * @var $errors    \Illuminate\Support\MessageBag
 */
$rand = randomString(8);

/** Common view parameters for form elements */
$var['container_class'] = $var['container_class'] ?? 'col-md-3';
$var['name'] = $var['name'] ?? 'NO_NAME';
$var['params'] = $var['params'] ?? [];
$var['params']['class'] = (isset($var['params']['class'])) ? $var['params']['class']." form-control " : ' form-control ';
$var['value'] = $var['value'] ?? '';
$var['label'] = $var['label'] ?? '';
$var['label_class'] = $var['label_class'] ?? '';
$var['old_input'] = oldInputValue($var['name'], $var['value']);
if (! isset($var['editable'])) {
    $var['editable'] = (isset($elementIsEditable) && $elementIsEditable == false) ? false : true;
}
if ($var['editable'] == false) $var['params']['disabled'] = true;

/** Custom parameters */
$var['multiple'] = true;
$var['params'] = array_merge($var['params'], ['multiple']);
$var['params'] = array_merge($var['params'], ['id' => $var['name']]);

$options = $var['options'] ?? [];
?>

{{-- HTML for the input/select block --}}
<div class="form-group {{$errors->first($var['name'], ' has-error')}} {{$var['container_class']}}"
     data-parent="{{$rand}}">
    {{-- show label if label if available --}}
    @if(strlen(trim($var['label'])))
        <label id="label_{{$var['name']}}"
               class="control-label {{$var['label_class']}}"
               for="{{$var['name']}}">
            {!! $var['label'] !!}
        </label>
    @endif
    <?php $var['select_name'] = $var['name'].'[]'; ?>
    {{ Form::select($var['select_name'], $options, $var['old_input'], $var['params']) }}
    <input type="hidden" name="{{$var['name']}}" id="{{$var['name']}}_ghost" value="" disabled/>
    {!! $errors->first($var['name'], '<span class="help-block">:message</span>') !!}
</div>

@section('js')
    @parent
    <script>
        $('[data-parent= {{$rand}}] select[id={{$var['name']}}] ').change(function () {
            if (!$(this).val()) {
                $('[data-parent= {{$rand}}]  input[id={{$var['name']}}_ghost]')
                    .removeAttr('disabled');
            }
        });
    </script>
@endsection

<?php
#------------------------------------------------------------------
// Unset the local variable used in this view.
#------------------------------------------------------------------
unset($var, $options);?>