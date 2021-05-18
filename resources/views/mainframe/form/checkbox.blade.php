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
@if($input->isHidden)
    {{ Form::hidden($input->name, $input->value()) }}
@else
    <div class="{{$input->containerClasses()}}" id="{{$input->uid}}">

        {{-- input --}}
        <?php
        // $var = [
        //     'id'                 => $input->id,
        //     'class'              => $input->params['class'],
        //     'data-checkbox-name' => $input->name,
        //     'data-checkbox-id'   => $input->id,
        //     'data-checked-val'   => $input->checkedVal,
        //     'data-unchecked-val' => $input->uncheckedVal
        // ];
        //
        // if (! $input->isEditable) {
        //     $var[] = 'disabled';
        // }
        ?>
        {{ Form::checkbox("checkbox_".$input->name, $input->value(),$input->checkedVal,$input->paramsForCheckbox()) }}

        {{-- label --}}
        @include('mainframe.form.includes.label')

        {{ Form::hidden($input->name, $input->value(), $input->paramsForHiddenInput()) }}

        {{-- Error --}}
        @include('mainframe.form.includes.show-error')

    </div>
@endif
<?php unset($input, $var) ?>