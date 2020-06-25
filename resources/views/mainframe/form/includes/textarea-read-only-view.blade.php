@if(!$input->isHidden)
    <div class="{{$input->params['class']}} readonly {{$input->name}}" id="{{$input->name}}">
        {{ $input->print() }}
    </div>
@endif
{{ Form::hidden($input->name, $input->value(), ['id'=>$input->params['id']] )}}