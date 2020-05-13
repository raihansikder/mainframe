@if(!$input->isHidden)
    <span class="{{$input->params['class']}} readonly">
        {{ $input->print() }}
    </span>
@endif
{{ Form::hidden($input->name, $input->value()) }}