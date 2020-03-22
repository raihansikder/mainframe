<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */
use App\Mainframe\Features\Form\Text\TextArea;

$var['type'] = $var['type'] ?? 'text';

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;
}
$input = new TextArea($var, $element ?? null);
?>
{{-- HTML for the input/select block --}}
<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}} {{$input->uid}}">

    @if($input->label)
        <label id="label_{{$input->name}}"
               class="control-label {{$input->labelClass}}"
               for="{{$input->name}}">
            {!! $input->label !!}
        </label>
    @endif

    @if($input->isEditable)
        {{ Form::textarea($input->name, $input->value(), $input->params) }}
    @else
        <div class="readonly">
            {{ $input->print() }}
            {{ Form::hidden($input->name, $input->value()) }}
        </div>
    @endif

    {!!  $errors->first($input->name, '<span class="help-block">:message</span>') !!}

</div>

{{-- js --}}
@section('js')
    @parent
    {{-- Instantiate the ckeditor if the class 'ckeditor' is added in textarea--}}
    @if(strpos( $input->params['class'], 'ckeditor')  !== false)
        <script>
            initEditor('{{ $input->params['id']}}', {{$input->editorConfig}});
        </script>
    @endif
@endsection

{{-- Unset the local variable used in this view. --}}
<?php unset($input) ?>