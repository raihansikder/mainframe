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
 */

/**
 * @var array $var
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 * @var string $formState create|edit
 */
// if (! isset($var['editable']) && isset($editable)) {
//     $var['editable'] = $editable;
//
//     // Check immutability
//     if ($editable && isset($immutables)) {
//         $var['editable'] = ! in_array($var['name'], $immutables);
//     }
// }
//
// if (! array_key_exists('element', $var)) {
//     $var['element'] = $element ?? null;
// }
// $var['immutables'] = $immutables ?? [];
//
// $var['errors'] = $errors ?? [] ;


// $var = \App\Mainframe\Features\Form\Form::setUpVar($var,$errors, $element, $editable, $immutables);

$var = \App\Mainframe\Features\Form\Form::setUpVar($var,
    $errors ?? null,
    $element ?? null,
    $editable ?? null,
    $immutables ?? null);

$input = new App\Mainframe\Features\Form\Text\InputText($var);
?>

<div class="{{$input->containerClasses()}}">
    @include('mainframe.form.includes.label')

    @if($input->isEditable)
        @if($input->type === 'password')
            {{ Form::password($input->name, $input->params) }}
        @else
            {{ Form::text($input->name, $input->value(), $input->params) }}
        @endif
    @else
        @include('mainframe.form.includes.read-only-view')
    @endif

    @include('mainframe.form.includes.show-error')
</div>

<?php unset($input) ?>