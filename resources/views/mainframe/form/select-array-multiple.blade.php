<?php
use App\Mainframe\Features\Form\Select\SelectArrayMultiple;

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;

    // Check immutability
    if (isset($immutables)) {
        $var['editable'] = ! in_array($var['name'], $immutables);
    }
}

$input = new SelectArrayMultiple($var, $element ?? null);
?>

<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}} {{$input->uid}}"
     data-parent="{{$input->dataParent}}">

    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    {{ Form::select($input->name.'[]', $input->options, $input->value(), $input->params) }}

    {!! $errors->first($var['name'], '<span class="help-block">:message</span>') !!}

    {{--
    Ghost input

    In the case of multiple select, if no option is selected then the empty value
    does not post. As a result the model fills with old value. To avoid this, when
    there is no selection, a blank html input is enabled.
    --}}
    <input type="hidden" name="{{$input->name}}" class="ghost" value="" disabled/>

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