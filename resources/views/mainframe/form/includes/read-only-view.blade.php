@if(!$input->isHidden)
    <span class="{{$input->params['class']}} readonly {{$input->name}}" id="{{$input->name}}">
        {{ $input->print() }}
    </span>
@endif

{{-- Show hidden values. They are useful --}}
@if(is_array($input->value()))
    @foreach($input->value() as $value)
        {{ Form::hidden($input->name.'[]', $value)}}
    @endforeach
@else
    {{ Form::hidden($input->name, $input->value())}}
@endif