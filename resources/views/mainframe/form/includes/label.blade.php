@if($input->label)
    <label id="label_{{$input->name}}"
           class="control-label {{$input->labelClass}}"
           for="{{$input->name}}">
        {!! $input->label !!}
    </label>
@endif