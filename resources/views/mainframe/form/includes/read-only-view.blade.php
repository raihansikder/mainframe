@if(!$input->isHidden)
    <span class="form-control readonly {{$input->name}}" id="{{$input->id}}">
        {{ $input->print() }}
    </span>
@endif

{{-- Show hidden values. They are useful --}}
@if(is_array($input->value()))
    @foreach($input->value() as $value)
        {{ Form::hidden($input->name.'[]', $value)}}
    @endforeach
@else
    {{ Form::hidden($input->name, $input->value(),$input->params)}}
@endif