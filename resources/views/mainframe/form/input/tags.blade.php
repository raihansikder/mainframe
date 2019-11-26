<?php
/** @var \App\Mainframe\Helpers\Modular\BaseModule\BaseModule $element */


use App\Mainframe\Helpers\Form\Text\Tags;

// $input = new InputText($var, $element ?? null);
$input = new Tags($var, $element ?? null);
?>
{{-- HTML for the input/select block --}}
<div class="form-group {{$input->containerClass}} {{$errors->first($input->name, ' has-error')}}">

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
        <span class="{{$input->params['class']}} readonly">
            {{ $input->print() }}
            {{ Form::hidden($input->name, $input->value()) }}
        </span>
    @endif

    {!!  $errors->first($input->name, '<span class="help-block">:message</span>') !!}

</div>

{{-- js --}}
@section('js')
    @parent
    {{-- Instantiate the ckeditor if the class 'ckeditor' is added in textarea--}}
    <script>
        $("textarea[name={{$input->name}}]").select2({
            tags: ['{!!$input->tags()!!}'],
            tokenSeparators: ['{!! $input->separator !!}']
        });
    </script>
@endsection

{{-- Unset the local variable used in this view. --}}
<?php unset($input) ?>