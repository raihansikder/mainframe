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
$input = new \App\Mainframe\Features\Form\Select\SelectArrayMultiple($var);
?>

<div class="{{$input->containerClasses()}}" id="{{$input->uid}}" data-parent="{{$input->dataParent}}">

    {{-- label --}}
    @include('mainframe.form.includes.label')

    {{-- input --}}
    {{ Form::select($input->name.'[]', $input->options, $input->value(), $input->params) }}
    {{--
    Ghost input

    In the case of multiple select, if no option is selected then the empty value
    does not post. As a result the model fills with old value. To avoid this, when
    there is no selection, a blank html input is enabled.
    --}}
    <input type="hidden" name="{{$input->name}}" class="ghost" value="" disabled/>

    {{-- Error --}}
    @include('mainframe.form.includes.show-error')

</div>

@section('js')
    @parent
    <script>
        $('[data-parent={{$input->dataParent}}] select[id={{$input->params['id']}}] ').change(function () {
            if (!$(this).val()) {
                $('[data-parent= {{$input->dataParent}}]  input[class=ghost]')
                    .prop('disabled', false);
            } else {
                $('[data-parent= {{$input->dataParent}}]  input[class=ghost]')
                    .prop('disabled', true);
            }
        });
    </script>
@endsection

<?php unset($input); ?>