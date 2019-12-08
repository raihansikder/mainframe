<?php
use App\Mainframe\Features\Form\Select\SelectArray;

$input = new SelectArray($var, $element ?? null);
?>
<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}}">

    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    {{ Form::select($input->name, $input->options, $input->value(), $input->params) }}

    {!! $errors->first($input->name, '<span class="help-block">:message</span>') !!}

</div>

<?php unset($input); ?>
