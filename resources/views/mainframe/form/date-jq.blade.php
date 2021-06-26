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
$input = new App\Mainframe\Features\Form\Text\Date($var);

$input->format = config('mainframe.config.date_format'); // Format to show in the datepicker
?>
@if($input->isHidden)
    {{ Form::hidden($input->name, $input->value()) }}
@else
    <div class="{{$input->containerClasses()}}" id="{{$input->uid}}">

        {{-- label --}}
        @include('mainframe.form.includes.label')

        {{-- input --}}
        @if($input->isEditable)
            {{ Form::text('formatted_'.$input->name, $input->formatted(), array_merge($input->params,['id'=> $input->params['id'].'_formatted'])) }}
            {{ Form::hidden($input->name, $input->value(),$input->params) }}
        @else
            @include('mainframe.form.includes.read-only-view')
        @endif

        {{-- Error --}}
        @include('mainframe.form.includes.show-error')
    </div>
@endif

@section('js')
    @if(!$input->isHidden && $input->isEditable)
        <?php
        $selector = '#'.$input->uid.' #'.$input->params['id'];
        ?>
        <script>
            var datepicker_{{$input->params['id']}} = initJQueryDatePicker('{{$selector}}');
        </script>
    @endif
    @parent
@stop

<?php unset($input) ?>