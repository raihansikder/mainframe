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
 */
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 * @var string $formState create|edit
 */

$input = new App\Mainframe\Features\Form\DeleteButton($var, $element ?? null);
// $input->params['name'] = 'genericDeleteBtn';
// $input->params['type'] = 'button';
// $input->params['class'] = 'button';
// $input->params['data-toggle'] = 'modal';
// $input->params['data-target'] = '#deleteModal';
// $input->params['data-route'] = $var;
// $input->params['data-route'] = 'button';
// $input->params['data-route'] = 'button';
?>

{{Form::button($input->value,$input->params)}}

{{--<button name='genericDeleteBtn'--}}
{{--        type='button'--}}
{{--        data-toggle='modal'--}}
{{--        data-target='#deleteModal'--}}
{{--        class='{{$class}}'--}}
{{--        data-route='{{$route}}'--}}
{{--        data-redirect_success='{{$redirect_success}}'--}}
{{--        data-redirect_fail='{{$redirect_fail}}'>--}}
{{--    {{$label}}--}}
{{--</button>--}}
