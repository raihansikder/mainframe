<?php
/*
|--------------------------------------------------------------------------
| Vars
|--------------------------------------------------------------------------
|
| This view partial can be included with a config variable $var.
| $var is an array and can have following keys.
| if a $var is not set the default value will be use.
|
*/
/**
 *      $var['container_class'] ?? 'col-md-3';
 *      $var['label']           ?? null;
 *      $var['label_class']     ?? null;
 *      $var['type']            ?? null;
 *      $var['value']           ?? null;
 *      $var['name']            ?? Str::random(8);
 *      $var['params']          ?? [];  // These are the html attributes like css, id etc for the field.
 *      $var['editable']        ?? true;
 *
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 * @var bool $editable
 * @var array $immutables
 */

$var = \App\Mainframe\Features\Form\Form::setUpVar($var, $errors ?? null, $element ?? null, $editable ?? null, $immutables ?? null);
$input = new \App\Mainframe\Features\Form\Select\SelectArray($var);
?>

<div class="{{$input->containerClasses()}}" id="{{$input->uid}}">

    {{-- label --}}
    @include('mainframe.form.includes.label')

    {{-- input --}}
    @if($input->isEditable)
        {{ Form::select($input->name, $input->options, $input->value(), $input->params) }}
    @else
        @include('mainframe.form.includes.read-only-view')
    @endif

    {{-- Error --}}
    @include('mainframe.form.includes.show-error')

</div>

<?php unset($input); ?>
