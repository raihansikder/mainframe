<?php
use App\Mainframe\Modules\Uploads\Upload;
$input = new App\Mainframe\Features\Form\Upload($var, $element ?? null);
?>

{{-- upload div + form --}}
<div class="{{$input->containerClass}}">

    @if($user->can(['create','update'], $element))

        <div id="{{$input->uploadBoxId}}" class="uploads-container">
            <form>
                @csrf
                <input type="hidden" name="ret" value="json"/>
                <input type="hidden" name="tenant_id" value="{{$input->tenantId}}"/>
                <input type="hidden" name="module_id" value="{{$input->moduleId}}"/>
                <input type="hidden" name="element_id" value="{{$input->elementId}}"/>
                <input type="hidden" name="element_uuid" value="{{$input->elementUuid}}"/>

                <input type="hidden" name="uploadable_id" value="{{$input->elementId}}"/>
                <input type="hidden" name="uploadable_type" value="{{$input->uploadableType}}"/>

                @if($input->elementUuid)
                    <input type="hidden" name="type" value="{{$input->type}}"/>
                @endif
            </form>
            <div class="file-uploader">Upload file</div>
        </div>

    @endif

    {{-- uploaded file list --}}
    @if($input->moduleId && $input->elementId)
        <?php
        $q = Upload::where('module_id', $input->moduleId)
            ->where('element_id', $input->elementId);

        if ($input->type) {
            $q->where('type', $input->type);
        }

        $q->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');

        $uploads = $q->offset(0)->take($input->limit)->get();
        ?>

        <div class="clearfix">
            @if(count($uploads))
                @include('mainframe.layouts.module.form.includes.features.uploads.uploads-list-default',$uploads)
            @endif
        </div>
    @endif
</div>

{{-- js --}}
@section('js')
    @parent
    @if($user->can(['create','update'], $model))
        <script>
            initUploader("{{$input->uploadBoxId}}", "{{ route('uploads.store')}}");
        </script>
    @endif
@endsection

<?php unset($input); ?>


