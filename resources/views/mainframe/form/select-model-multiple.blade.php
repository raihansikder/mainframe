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
 *      name_field
 *      value_field
 *      table
 *      query
 *      show_inactive
 *      cache
 *
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 * @var bool $editable
 * @var array $immutables
 */

$var = \App\Mainframe\Features\Form\Form::setUpVar($var, $errors ?? null, $element ?? null, $editable ?? null, $immutables ?? null);
$input = new \App\Mainframe\Features\Form\Select\SelectModelMultiple($var);
?>

@if($input->isHidden)
    @if(is_array($input->value()))
        @foreach($input->value() as $value)
            {{ Form::hidden($input->name.'[]', $value)}}
        @endforeach
    @endif
@else
    <div class="{{$input->containerClasses()}}" id="{{$input->uid}}" data-parent="{{$input->dataParent}}">

        {{-- label --}}
        @include('mainframe.form.includes.label')

        {{-- input --}}
        {{ Form::select($input->name.'[]', $input->options(), $input->value(), $input->params) }}
        {{--
        Ghost input
        ==================================================
        In the case of multiple select, if no option is selected then the empty value
        does not post. As a result the model fills with old value. To avoid this, when
        there is no selection, a blank html input is enabled.
        --}}
        <input type="hidden" name="{{$input->name}}" class="ghost" value="" disabled/>

        {{-- Place hidden input if not editable--}}
        @if(!$input->isEditable)
            @if(is_array($input->value()))
                @foreach($input->value() as $value)
                    {{ Form::hidden($input->name.'[]', $value)}}
                @endforeach
            @endif
        @endif

        {{-- Error --}}
        @include('mainframe.form.includes.show-error')
    </div>
@endif

@section('js')

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

    @parent
@endsection

<?php unset($input); ?>