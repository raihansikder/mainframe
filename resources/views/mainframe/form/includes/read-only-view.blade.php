@if(!$input->isHidden)
    <span class="{{$input->params['class']}} readonly {{$input->name}}" id="{{$input->name}}">
        {{ $input->print() }}
    </span>
@endif
{{ Form::hidden($input->name, $input->value(), ['id'=>$input->params['id']] )}}