<?php
/** @var \App\Mainframe\Helpers\Modular\BaseModule\BaseModule $element */
use App\Mainframe\Helpers\Form\Text\InputText;

$var['type'] = $var['type'] ?? 'text';
$input = new InputText($var, $element ?? null);
?>

<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}}">

    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    @if($input->isEditable)
        @if($input->type === 'password')
            {{ Form::password($input->name, $input->params) }}
        @else
            {{ Form::text($input->name, $input->old(), $input->params) }}
        @endif
    @else
        <span class="{{$input->params['class']}} readonly">
            {{$input->readOnlyValue()}}
        </span>
    @endif

    {!! $errors->first($input->name, '<span class="help-block">:message</span>') !!}

</div>

{{-- Unset the local variable used in this view. --}}
<?php unset($input) ?>