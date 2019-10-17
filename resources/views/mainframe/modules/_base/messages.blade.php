<?php
$var['module_id'] = isset($var['module_id']) ? $var['module_id'] : $currentModule->id;
$var['moduleName'] = isset($var['moduleName']) ? $var['moduleName'] : $currentModule->name;
$var['element_id'] = isset($var['element_id']) ? $var['element_id'] : null;
$var['tenantId'] = tenantUser() ? userTenantId() : null;
if ((isset($element) && isset($$element))) {
    $element_id = $$element->id;
    $var['element_id'] = $var['element_id'] ? $var['element_id'] : $$element->id;
    //$var['element_uuid'] = $var['element_uuid'] ? $var['element_uuid'] : $$element->uuid;
    // If still there is no tenantId resolved from user, attempt to resolve from $element.
    $var['tenantId'] = (!$var['tenantId'] && isset($$element->tenantId)) ? $$element->tenantId : $var['tenantId'];

}
$related_user_email[] = null;
$related_users_id[] = null;
//$related_users = element($var['module_id'], $var['element_id'])->relatedUsers(); //get the related users
$related_users = User::where('group_ids_csv', 1)->get();
foreach ($related_users as $related_user) {
    $related_users_id[] = $related_user->id;
    $related_user_email[] = $related_user->email;
}
if(user()->group_ids_csv == 3) $related_users_id[] = user()->id;
$related_user_email = array_filter($related_user_email);

// $message_box_header = !isset($message_box_header) ? "Messages" : $message_box_header;
// $message_type = !isset($message_type) ? "generic" : $message_type;
?>

<div id="element" class="col-sm-12 no-padding-l">
    <h4 class="no-padding-l"></h4>
    <table id="tblMessageList">
        <tbody v-for="message in messages">
        <tr v-if="messages.length > 0">
            <td class="">
                <b style="background-color:#f0ffc6;">@{{message.creator.name}}(@{{message.creator.email}})</b>&nbsp;
                wrote on @{{message.created_at}}
            </td>
        </tr>
        <tr v-if="messages.length > 0"></tr>
        <tr v-if="messages.length > 0">
            <td>@{{message.body}}</td>
        </tr>
        <tr v-if="messages.length > 0"></tr>
        </tbody>
    </table>
    <br>
    @if(hasModulePermission('messages','create'))
        <button type="button" class="btn btn-default btn-sm pull-left" data-toggle="modal"
                data-target="#add_message_modal">
            <i class="fa fa-pencil"></i> New Message
        </button>
    @endif


    @if(hasModulePermission('messages','create'))
        <div id="add_message_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('messages.store')}}" name="messages" id="messages"
                          style="margin: 30px;">
                        <div class="modal-body row">
                            <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                            <input name="ret" type="hidden" value=""/>
                            <input name="module_id" type="hidden" value="{{$var['module_id']}}"/>
                            <input name="module_entry_id" type="hidden" value="{{$var['element_id']}}"/>
                            <input name="updated_by" type="hidden" value="{{ user()->id }}"/>
                            <input name="is_active" type="hidden" value="1"/>
                            <input name="tenantId" type="hidden" value="{{$var['tenantId'] }}"/>
                            <div class="clearfix"></div>
                            <br>
                            {{--add users--}}
                            @include('form.input-hidden',['var'=>['name'=>'recipient_users','value'=>implode(',',$related_users_id)]])
                            <div class="col-md-12">
                                <textarea class="form-control " name="body" value="" style="height: 200px"
                                          placeholder="Type Your Message here..."></textarea>
                            </div>
                        </div>

                        <div class="modal-footer" style="border: none;">
                            <button id="messagesSubmitBtn" type="submit" class="btn btn-success">Send Message
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @endif
</div>


@section('js')
    @parent
    {{-- vue--}}
    <script>
        var vue = new Vue({
            el: '#element',
            data: {messages: []},
            methods: {
                makeDeleteUrl: function (id) { // Function returns the POST URL for deleting the entry.
                    return '{{route('home')}}messages/' + id;
                },
                makeFileEditUrl: function (id) { // Function returns the GET URL for the details page of the entry
                    return '{{route('home')}}messages/' + id;
                }
            },
            mounted: function () { // Initially when this vue instance is mounted do the following.
                axios({ // 1. GET the list of items from from some API/url
                    url: "{{route('messages.list-json')}}?module_id={{$var['module_id']}}&module_entry_id={{$var['element_id']}}",
                    method: 'get'
                }).then(function (response) {
                    vue.messages = response.data.data; // 2. Load the whole data in vue variable.

                }).catch(function (error) {
                    console.log(error); // 3. Log any error (Good for debugging).
                });
                /*******************************************************************/
            },
            updated: function () { // Trigger following when the list is updated and DOM is populated.
                initGenericDeleteBtn(); // Enables the generic delete button in newly added row.
            }
        });
        /*******************************************************************/
        //				 frontend and Ajax hybrid validation
        /*******************************************************************/
        // 1. add validation classes/rules
        $('form[name=messages] input[name=body]').addClass('validate[required]');

        // 2. instantiate validation function with a handler function which updates the DOM upon successful operation. i.e. add a new row in a table if store is successful.
        enableValidation('messages', storeMessageSuccessHandler);

        //alert(ret);
        // 3. specific handler function. Name should be unique
        function storeMessageSuccessHandler(ret) {
            vue.messages.push(ret.data); // Push the new element into vue array.
            $('#messages').trigger("reset"); // Reset the form.
            $('#add_message_modal').modal('hide'); // 8. hide the modal showing the form
        }

        //load users
        {{--var users = '{{implode(',',$related_user_email)}}';--}}
        {{--$("input[name=recipient_users]").select2({--}}
        {{--//formatResult: format,--}}
        {{--tags: [],--}}
        {{--initSelection: function (element, callback) {--}}
        {{--var id = element.val().split(',');--}}
        {{--var data = [];--}}
        {{--$(users.split(",")).each(function (i) {--}}
        {{--var item = this.split(',');--}}
        {{--data.push({--}}
        {{--id: id[i],//load the id--}}
        {{--text: item[0] // load the text--}}
        {{--});--}}

        {{--});--}}
        {{--//var text = $("input[name=recipient_users]").val();--}}
        {{--//var data = [{id: id, text: text}];--}}
        {{--callback(data);--}}
        {{--},--}}
        {{--ajax: {--}}
        {{--dataType: "json",--}}
        {{--url: "{{ route('users.list')}}",--}}
        {{--quietMillis: 1000,--}}
        {{--data: function (term, page) {--}}
        {{--return {--}}
        {{--term: term--}}
        {{--};--}}
        {{--},--}}
        {{--results: function (data) {--}}
        {{--return {--}}
        {{--results: $.map(data, function (item) {--}}
        {{--return {--}}
        {{--text: item.email,--}}
        {{--id: item.id--}}
        {{--}--}}

        {{--})--}}
        {{--};--}}
        {{--}--}}
        {{--}--}}
        {{--});--}}


        /*******************************************************************/
    </script>
@endsection