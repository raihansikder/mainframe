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
 *      $var['div'] ?? 'col-md-3';
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
$input = new \App\Mainframe\Features\Form\Checkbox\Checkbox($var);
?>

<div class="{{$input->containerClasses()}}" id="{{$input->uid}}">

    {{-- input --}}
    <input name="checkbox_{{$input->name}}"
           type="checkbox"
           value="{{$input->value()}}"
           id="{{$input->params['id']}}"
           class="{{$input->params['class']}} spyr-checkbox"
           data-checkbox-name="{{$input->name}}"
           data-checked-val="{{$input->checkedVal}}"
           data-unchecked-val="{{$input->uncheckedVal}}"
            {{ $input->isEditable != 1 ? 'disabled' : '' }}/>

    {{-- label --}}
    @include('mainframe.form.includes.label')

    {{ Form::hidden($input->name, $input->value()) }}

    {{-- Error --}}
    @include('mainframe.form.includes.show-error')

</div>

<?php unset($input) ?>