@if($input->label)
    <label id="label_{{$input->name}}"
           class="control-label {{$input->labelClass}}"
           for="{{$input->name}}">
        {!! $input->label !!}
    </label>
    @if($input->tooltip)
        <i class="fa fa-info-circle text-gray" data-toggle="tooltip" data-placement="top" title="{{$input->tooltip}}"></i>
    @endif
@endif