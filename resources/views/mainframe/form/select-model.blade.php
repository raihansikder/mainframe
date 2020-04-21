<?php
use App\Mainframe\Features\Form\Select\SelectModel;

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;

    // Check immutability
    if ($editable && isset($immutables)) {
        $var['editable'] = ! in_array($var['name'], $immutables);
    }
}

$input = new SelectModel($var, $element ?? null);
?>
<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}} {{$input->uid}}">

    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    @if($input->isEditable)
        {{ Form::select($input->name, $input->options, $input->value(), $input->params) }}
    @else
        <span class="{{$input->params['class']}} readonly">
            {{ $input->print() }}
            {{--{{ Form::hidden($input->name, $input->print()) }}--}}
        </span>
    @endif

    {!! $errors->first($input->name, '<span class="help-block">:message</span>') !!}

</div>

<?php unset($input); ?>