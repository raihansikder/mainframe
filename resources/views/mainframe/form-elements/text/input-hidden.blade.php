<?php
/** @var \App\Mainframe\Helpers\Modular\BaseModule\BaseModule $element */
use App\Mainframe\Helpers\Form\Text\InputHidden;

$var['type'] = $var['type'] ?? 'hidden';
$input = new InputHidden($var, $element ?? null);
?>

<div class="{{$input->containerClass}}">
    {{ Form::hidden($input->name, $input->old(), $input->params) }}
</div>

<?php unset($input) ?>