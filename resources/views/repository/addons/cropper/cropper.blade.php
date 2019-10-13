<?php
/**
 * @var $mod Module
 * @var $var array
 */
$rand = randomString();

/** View parameters */
$var['img_src'] = (isset($var['img_src'])) ? $var['img_src'] : '';
$var['img_id'] = (isset($var['img_id'])) ? $var['img_id'] : $rand;
$var['img_width_px'] = (isset($var['img_width_px'])) ? $var['img_width_px'] : '200';
$var['img_height_px'] = (isset($var['img_height_px'])) ? $var['img_height_px'] : '200';
$var['input_name'] = (isset($var['input_name'])) ? $var['input_name'] : 'img';
$var['module_id'] = isset($var['module_id']) ? $var['module_id'] : $mod->id;
$var['module_name'] = isset($var['module_name']) ? $var['module_name'] : $mod->name;
$var['element_id'] = isset($var['element_id']) ? $var['element_id'] : null;
$var['element_uuid'] = isset($var['element_uuid']) ? $var['element_uuid'] : null;
$var['type'] = isset($var['type']) ? $var['type'] : null;
$var['container_class'] = isset($var['container_class']) ? $var['container_class'] : ''; // container_class: main wrapper div class.
/** Internal variables */
$var['tenant_id'] = tenantUser() ? userTenantId() : null;
$var['img_container_id'] = "img_container_" . $rand;
$var['outputUrlId'] = "outputUrlId_" . $rand;

/** Parameter value overrides */
// If an $element is present (normally during edit) in the context then set tenant_id and element
// fields based on that element.
if ((isset($element) && isset($$element))) {
    $var['element_id'] = $var['element_id'] ? $var['element_id'] : $$element->id;
    $var['element_uuid'] = $var['element_uuid'] ? $var['element_uuid'] : $$element->uuid;
    // If still there is no tenant_id resolved from user, attempt to resolve from $element.
    $var['tenant_id'] = (!$var['tenant_id'] && isset($$element->tenant_id)) ? $$element->tenant_id : $var['tenant_id'];

} else {
    // During creation when element is not ready but $uuid is generated.
    $var['element_uuid'] = (!$var['element_uuid'] && isset($uuid)) ? $uuid : $var['element_uuid'];
}
?>

<div class="clearfix"></div>
<div style="width:{{$var['img_width_px']}}px; height: {{$var['img_height_px']}}px; position: relative"
     class="shadow {{$var['container_class']}}">
    <div id="{{$var['img_container_id']}}" style="width:200px; height: 200px; border: 1px dotted grey">
        @if(strlen($var['img_src']))
            <img style="width:{{$var['img_width_px']}}px; height: {{$var['img_height_px']}}px;"
                 src="{{$var['img_src']}}" id="{{$var['img_id']}}"/>
        @endif
    </div>
    <input name="{{$var['input_name']}}" id="{{$var['outputUrlId']}}" type="hidden" value="{{$var['img_src']}}"/>
</div>



@section('head')
    @parent
    <link href="{{ asset('assets/croppic/assets/css/croppic.css')}}" rel="stylesheet"/>
@endsection

@section('js')
    @parent
    <script src="{{ asset('assets/croppic/assets/js/jquery.mousewheel.min.js')}}"></script>
    <script src="{{ asset('assets/croppic/croppic.min.js')}}"></script>
    <script type="text/javascript">
        /*******************************************************************/
        // croppic image crop
        var croppicContainerPreloadOptions = {
            uploadUrl: '{{route('uploads.store')}}',
            uploadData: {
                "tenant_id": "{{$var['tenant_id']}}",
                "module_id": "{{$var['module_id']}}",
                "element_id": "{{$var['element_id']}}",
                "element_uuid": "{{$var['element_uuid']}}",
                "type": "{{$var['type']}}",
                "input_name": "img",
                "ret": "json"
            },
            cropUrl: '{{route('croppic-crop')}}',
            cropData: {
                //"test": "send_something", // Additionally send some data to crop handler
            },
            modal: false,
            loadPicture: '{{$var['img_src']}}',
            enableMousescroll: true,
            doubleZoomControls: false,
            rotateControls: false,
            loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
            'outputUrlId': '{{$var['outputUrlId']}}', // After successful image cropping, cropped img url is set as value for the input containing the outputUrlId
            imgEyecandy: false,
            onBeforeImgUpload: function () {
                console.log('onBeforeImgUpload')
            },
            onAfterImgUpload: function () {
                console.log('onAfterImgUpload');
                $("button[name=submit]").attr('disabled', 'disabled');
                $('i.cropControlCrop').addClass('bg-red');
                $('#cropModal').modal('show');
                //$('button[name=submit]').html('Crop image ..');
            },
            onImgDrag: function () {
                console.log('onImgDrag')
            },
            onImgZoom: function () {
                console.log('onImgZoom')
            },
            onBeforeImgCrop: function () {
                console.log('onBeforeImgCrop')
            },
            onAfterImgCrop: function () {
                console.log('onAfterImgCrop');
                $('button[name=submit]').removeAttr('disabled');
                $('div#{{$var['img_container_id']}} .croppedImg').css('width', 'inherit');

                /** Reloads newly cropped image in container */
                d = new Date();
                var new_img = $("div#{{$var['img_container_id']}} img.croppedImg").attr('src') + "?" + d.getTime();
                console.log(new_img);

                $("div#{{$var['img_container_id']}} img.croppedImg").attr("src", new_img);
            },
            onError: function (errormessage) {
                console.log('onError:' + errormessage)
            }
        };
        var cropContainerPreload = new Croppic('{{$var['img_container_id']}}', croppicContainerPreloadOptions);
        $('#' + '{{$var['img_container_id']}}').addClass('img_placeholder') // add a gray area to show a place holder

    </script>
@endsection

<?php unset($var); ?>