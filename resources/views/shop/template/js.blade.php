<script src="{{asset('letsbab/shop/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('letsbab/shop/js/popper.js')}}"></script>
<script src="{{asset('letsbab/shop/js/bootstrap-material-design.js')}}"></script>
<script src="{{asset('letsbab/shop/js/jquery.appear.js')}}"></script>
<script src="{{asset('letsbab/shop/js/slick.min.js')}}"></script>
<script src="{{asset('letsbab/shop/js/custom.js')}}"></script>
<script src="{{asset('templates/admin/plugins/validation/js/languages/jquery.validationEngine-en.js')}}"></script>
<script src="{{asset('templates/admin/plugins/validation/js/jquery.validationEngine.js')}}"></script>
<script src="{{asset('templates/admin/js/spyr-validation.js')}}"></script>
<script src="{{asset('templates/admin/plugins/uploadfile/jquery.form.js')}}"></script>
<script src="{{asset('templates/admin/plugins/uploadfile/jquery.uploadfile.js')}}"></script>
@section('js')
    {{-- js section --}}
    <!--suppress JSUnresolvedFunction -->
    <script>
        $(document).ready(function () {
            $('body').bootstrapMaterialDesign();
        });

        /**
         * initUploader function initiates the generic uploader used commonly in modules
         *
         * documentations http://hayageek.com/docs/jquery-upload-file.php#doc
         * @param id : root div container of the uploader
         * @param url : url where uploader will post the data
         */
        function initUploader(id, url) {
            $("#" + id + " #fileuploader").uploadFile({
                dragDropStr: "<span style='margin-left: 5px'> -OR- Drop files here</span>",
                url: url,
                method: "POST",
                //allowedTypes: "",
                fileName: "file",
                showStatusAfterSuccess: true,
                autoSubmit: true,
                dragDrop: true,
                dragdropWidth: '70%',
                //maxFileSize: 8,
                //maxFileCount: 1,
                //acceptFiles: "audio/*",
                multiple: true,
                statusBarWidth: '70%',
                uploadButtonClass: 'btn btn-default btn-sm btn-flat',
                returnType: 'json',
                showPreview: true,
                showDone: true,
                doneStr: '100% complete',
                // dynamicFormData: function () {                   // old implementation
                //     return {
                //         "ret": "json",
                //         //"tenant_id": $("#" + id + " form input[name=tenant_id]").val(),
                //         //"module_id": $("#" + id + " form input[name=module_id]").val(),
                //         //"element_id": $("#" + id + " form input[name=element_id]").val(),
                //         //"element_uuid": $("#" + id + " form input[name=element_uuid]").val()
                //     };
                // },
                dynamicFormData: function () {                      // New implementation using serialization
                    return $('#' + id + ' form').serialize();
                },
                //onSuccess: function (files, ret, xhr){};
                onSuccess: function (files, ret) {
                    loadMsg(parseJson(ret));
                    $('#msgModal').modal('show');
                    //console.log(ret);
                    // var path = ret.message.path;
                },
                //onError: function (files, status, errMsg) {};
                onError: function () {
                    $("#status").html("<span style='color: green;'>Something Wrong</span>");
                }
            });
        }
    </script>
@show