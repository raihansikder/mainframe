<?php
/** @var \App\Mainframe\Helpers\Modular\BaseModule\BaseModule $element */
use App\Mainframe\Helpers\Form\Text\InputHidden;

$input = new InputHidden($var, $element ?? null);
?>

<div class="{{$input->containerClass}}">
    {{ Form::hidden($input->name, $input->value(), $input->params) }}
</div>

<?php unset($input) ?>