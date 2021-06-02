<?php
/*
|--------------------------------------------------------------------------
| Vars
|--------------------------------------------------------------------------
|
| This view partial can be included with a config variable $var.
| $var is an array and can have following keys.
| if a $var is not set the default value will be use.
|
*/
/**
 *      $var['div'] ?? 'col-md-3';
 *      $var['label']           ?? null;
 *      $var['label_class']     ?? null;
 *      $var['type']            ?? null;
 *      $var['value']           ?? null;
 *      $var['name']            ?? Str::random(8);
 *      $var['params']          ?? [];  // These are the html attributes like css, id etc for the field.
 *      $var['editable']        ?? true;
 *
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
 * @var bool $editable
 * @var array $immutables
 */

$var = \App\Mainframe\Features\Form\Form::setUpVar($var, $errors ?? null, $element ?? null, $editable ?? null, $immutables ?? null);
$input = new App\Mainframe\Features\Form\Upload($var);

$uploads = [];
if ($input->moduleId && $input->elementId) {
    /** @var \Illuminate\Database\Eloquent\Builder $query */
    $query = $element->uploads();
    if ($input->type) {
        $query->where('type', $input->type);
    }
    $uploads = $query->orderBy('order', 'ASC')->orderBy('created_at', 'DESC')
        ->offset(0)->take($input->limit)
        ->get();
}

?>

{{-- upload div + form --}}
<div class="{{$input->containerClass}}  {{$input->uid}}">
    @if($input->isEditable)
        <div id="{{$input->uploadBoxId}}" class="uploads-container">
            <form>
                @csrf
                <input type="hidden" name="ret" value="json"/>
                <input type="hidden" name="tenant_id" value="{{$input->tenantId}}"/>
                <input type="hidden" name="module_id" value="{{$input->moduleId}}"/>
                <input type="hidden" name="element_id" value="{{$input->elementId}}"/>
                <input type="hidden" name="element_uuid" value="{{$input->elementUuid}}"/>
                {{-- <input type="hidden" name="uploadable_id" value="{{$input->elementId}}"/>--}}
                {{-- <input type="hidden" name="uploadable_type" value="{{$input->uploadableType}}"/>--}}
                @if($input->type)
                    <input type="hidden" name="type" value="{{$input->type}}"/>
                @endif
            </form>
            <div class="file-uploader">Upload file</div>
        </div>
    @endif

    {{-- uploaded file list --}}
    @if(count($uploads))
        @include('mainframe.layouts.module.form.includes.features.uploads.uploads-list-default',$uploads)
    @endif
</div>

{{-- js --}}
@section('js')

    @if($input->isEditable)
        <script>
            {{--initUploader("{{$input->uploadBoxId}}", "{{ route($module->name.'.uploads.store', $element->id)}}");--}}
            initUploader("{{$input->uploadBoxId}}", "{{ route('uploads.store')}}");
        </script>
    @endif

    @parent
@endsection

<?php unset($input); ?>