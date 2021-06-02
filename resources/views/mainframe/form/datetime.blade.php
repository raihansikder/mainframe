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
$input = new App\Mainframe\Features\Form\Text\Datetime($var);

$input->format = config('mainframe.config.datetime_format'); // Format to show in the datepicker
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
            $('#{{$input->uid}} #{{$input->params['id'].'_formatted'}}').datetimepicker(
                {
                    sideBySide: true,
                    format: 'DD-MM-YYYY HH:mm:ss' // https://momentjs.com/docs/#/displaying/format/
                }
            ).on('dp.change', function (e) {

                var formattedDateTime = $(this).val();                      // '01-04-2020 02:01:11'
                var formattedDateTimeParts = formattedDateTime.split(' ');  // ['01-04-2020', '02:01:11']

                var datePart = formattedDateTimeParts[0];               // '01-04-2020'
                var timePart = formattedDateTimeParts[1];               // '02:01:11'

                var dateParts = datePart.split('-');                    // ['01','04','2020']
                var date = dateParts[0];                                // '01'
                var month = dateParts[1];                               // '04'
                var year = dateParts[2];                                // '2020'

                // Generate valid format for database store
                var datetime = year + '-' + month + '-' + date + ' ' + timePart;
                var validDatetime = moment(datetime).format('YYYY-MM-DD HH:mm:ss');

                // Clear out invalid date-time
                if (validDatetime.length < 19) {
                    validDatetime = null;
                }

                $('#{{$input->uid}} #{{$input->params['id']}}').val(validDatetime);
            });
        </script>
    @endif

    @parent
@stop

<?php unset($input) ?>