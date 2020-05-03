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

use App\Mainframe\Features\Form\Text\Date;

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;

    // Check immutability
    if ($editable && isset($immutables)) {
        $var['editable'] = ! in_array($var['name'], $immutables);
    }
}

$input = new Date($var, $element ?? null);
?>

<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, 'has-error')}} {{$input->uid}}">

    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    @if($input->isEditable)
        {{ Form::text($input->name, $input->value(), $input->params) }}
    @else
        <span class="{{$input->params['class']}} readonly">
            {{ $input->print() }}
            {{ Form::hidden($input->name, $input->value()) }}
        </span>
    @endif

    {!! $errors->first($input->name, '<span class="help-block">:message</span>') !!}
</div>

@section('js')
    @parent
    <script>
        $('#{{$input->params['id']}}').datepicker(
            {
                format: 'yyyy-mm-dd',
                autoclose: true,
                clearBtn: true
            }
        );
    </script>
@stop

<?php unset($input) ?>