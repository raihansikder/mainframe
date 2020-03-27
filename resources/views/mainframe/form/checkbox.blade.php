<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */

use App\Mainframe\Features\Form\Checkbox\Checkbox;

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;

    // Check immutability
    if (isset($immutables)) {
        $var['editable'] = ! in_array($var['name'], $immutables);
    }
}

$input = new Checkbox($var, $element ?? null);
?>

<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}} {{$input->uid}}">

    <input name="checkbox_{{$input->name}}"
           type="checkbox"
           value="{{$input->value()}}"
           id="{{$input->params['id']}}"
           class="{{$input->params['class']}} spyr-checkbox"
           data-checkbox-name="{{$input->name}}"
           data-checked-val="{{$input->checkedVal}}"
           data-unchecked-val="{{$input->uncheckedVal}}"
            {{ $input->isEditable != 1 ? 'disabled' : '' }}/>

    @if(strlen(trim($input->label)))
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    {{ Form::hidden($input->name, $input->value()) }}

    {!! $errors->first($input->name, '<span class="help-block">:message</span>') !!}

</div>

<?php unset($input) ?>