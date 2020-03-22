<?php
/** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $element */
/** @var \App\User $user */

// Check edibility
if (! isset($var['editable']) && isset($editable)) {
    $var['editable'] = $editable;
}
$input = new App\Mainframe\Features\Form\Upload($var, $element ?? null);

$uploads = null;
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
    @parent
    @if($input->isEditable)
        <script>
            {{--initUploader("{{$input->uploadBoxId}}", "{{ route($module->name.'.uploads.store', $element->id)}}");--}}
            initUploader("{{$input->uploadBoxId}}", "{{ route('uploads.store')}}");
        </script>
    @endif
@endsection

<?php unset($input); ?>