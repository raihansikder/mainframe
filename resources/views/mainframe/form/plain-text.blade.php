<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */
use App\Mainframe\Features\Form\Text\PlainText;

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;
}
$var['type'] = $var['type'] ?? 'text';
$input = new PlainText($var, $element ?? null);

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