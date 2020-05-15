@if(!$input->isHidden)
    <div class="readonly">
        {{ $input->print() }}
    </div>
@endif
{{ Form::hidden($input->name, $input->value()) }}