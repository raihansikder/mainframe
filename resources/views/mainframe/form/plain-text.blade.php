<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */

$var = \App\Mainframe\Features\Form\Form::setUpVar($var, $errors ?? null, $element ?? null, $editable ?? null, $immutables ?? null);
$input = new \App\Mainframe\Features\Form\Text\PlainText($var);

?>

<div class="{{$input->containerClasses()}}" id="{{$input->uid}}">

    {{-- label --}}
    @include('mainframe.form.includes.label')

    {{-- value --}}
    <span class="{{$input->params['class']}} readonly">
        {{$input->print()}}
    </span>

</div>

<?php unset($input) ?>