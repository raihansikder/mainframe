<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */
use App\Mainframe\Features\Form\Text\InputHidden;

$input = new InputHidden($var, $element ?? null);
?>

<div class="{{$input->containerClass}} {{$input->uid}}">
    {{ Form::hidden($input->name, $input->value(), $input->params) }}
</div>

<?php unset($input) ?>