<?php

use App\Mainframe\Modules\Uploads\Upload;
/**
 * @var $module \App\Mainframe\Modules\Modules\Module
 * @var $var array
 * @var \App\Superhero $element
 */
$rand = randomString();

/** View parameters */
$var['module_id'] = $var['module_id'] ?? $module->id;
$var['moduleName'] = $var['moduleName'] ?? $module->name;
$var['element_id'] = $var['element_id'] ?? null;
$var['element_uuid'] = $var['element_uuid'] ?? null;
$var['type'] = $var['type'] ?? null;
$var['limit'] = $var['limit'] ?? 999;
$var['container_class'] = $var['container_class'] ?? ''; // container_class: main wrapper div class.
/** Internal variables */
$var['tenantId'] = tenantUser() ? userTenantId() : null;
$var['upload_container_id'] = "img_container_".$rand;

/** Parameter value overrides */

// If an $element is present (normally during edit) in the context then set tenantId and element
// fields based on that element.
if (($element->isCreating())) {
    $var['element_uuid'] = (! $var['element_uuid'] && isset($uuid)) ? $uuid : $var['element_uuid'];
} else {
    $var['element_id'] = $var['element_id'] ? $var['element_id'] : $element->id;
    $var['element_uuid'] = $var['element_uuid'] ? $var['element_uuid'] : $element->uuid;
    // If still there is no tenantId resolved from user, attempt to resolve from $element.
    $var['tenantId'] = (! $var['tenantId'] && isset($element->tenantId)) ? $element->tenantId : $var['tenantId'];
}

?>

{{-- upload div + form --}}
<div class="{{$var['container_class']}}">
    @if(hasModulePermission($module->name,'create') || hasModulePermission($module->name,'edit'))
        {{-- A form where values are stored that are later posted with attached file --}}
        {{-- initUploader gets these values and post to upload route  --}}
        <div id="{{$var['upload_container_id']}}" class="uploads_container">
            <form>
                {{csrf_field()}}
                <input type="hidden" name="ret" value="json"/>
                <input type="hidden" name="tenantId" value="{{$var['tenantId']}}"/>
                <input type="hidden" name="module_id" value="{{$var['module_id']}}"/>
                <input type="hidden" name="element_id" value="{{$var['element_id']}}"/>
                <input type="hidden" name="element_uuid" value="{{$var['element_uuid']}}"/>
                @if($var['type'])
                    <input type="hidden" name="type" value="{{$var['type']}}"/>
                @endif
            </form>
            <div id="fileuploader">Upload file</div>
        </div>
    @endif

    {{-- uploaded file list --}}
    @if($var['module_id'] && $var['element_id'])
        <?php
        $q = Upload::where('module_id', $var['module_id'])
            ->where('element_id', $var['element_id'])->whereNull('deleted_at');
        if ($var['type']) $q = $q->where('type', $var['type']);
        $q = $q->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');
        $uploads = $q->offset(0)->take($var['limit'])->get();
        // $uploads = Upload::getList($var['element_uuid'])
        ?>
        <div class="clearfix">
            {{-- uploaded file list --}}
            @if(count($uploads))
                @include('mainframe.layouts.module.form.includes.features.uploads.uploads-list-default',$uploads)
            @endif
        </div>
    @endif
</div>

{{-- js --}}
@section('js')
    @parent
    @if(hasModulePermission($module->name,'create') || hasModulePermission($module->name,'edit'))
        <script>
            initUploader("{{$var['upload_container_id']}}", "{{ route('uploads.store')}}"); // init initially
        </script>
    @endif
@endsection

<?php
unset($var);
unset($q);
unset($uploads);
?>


