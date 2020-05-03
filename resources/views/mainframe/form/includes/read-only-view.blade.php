<span class="{{$input->params['class']}} readonly">
        {{ $input->print() }}
    {{ Form::hidden($input->name, $input->value()) }}
</span>