<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */
use App\Mainframe\Features\Form\Text\PlainText;

$var['type'] = $var['type'] ?? 'text';
$input = new PlainText($var, $element ?? null);

?>

<div class="form-group {{$input->containerClass}} {{$input->uid}}">
    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    <span class="{{$input->params['class']}} readonly">
        {{$input->print()}}
    </span>

</div>

<?php unset($input) ?>