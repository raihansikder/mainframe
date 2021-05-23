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
    @if(!$input->isHidden)
        <script>
            var datepicker_{{$input->params['id']}} = $('#{{$input->uid}} #{{$input->params['id'].'_formatted'}}').datepicker(
                {
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    clearBtn: true
                }
            ).on('clearDate', function (ev) {

                $('#{{$input->uid}}  #{{$input->params['id']}}').val(null);

            }).on('changeDate', function (ev) {

                var validDate = null;
                var formattedDate = $(this).val();       // '01-04-2020'

                if (formattedDate.length) {

                    var dateParts = formattedDate.split('-');           // ['01','04','2020']
                    var day = dateParts[0];             // '01'
                    var month = dateParts[1];           // '04'
                    var year = dateParts[2];            // '2020'
                    // console.log(year.length + " " + month.length + " " + day.length);

                    if (year.length == 4 && month.length == 2 && day.length == 2) {
                        validDate = year + '-' + month + '-' + day;
                    }
                }

                $('#{{$input->uid}}  #{{$input->params['id']}}').val(validDate);

            });
        </script>
    @endif
    @parent
@stop

<?php unset($input) ?>