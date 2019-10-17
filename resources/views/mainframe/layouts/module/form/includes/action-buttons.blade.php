<div class="clearfix"></div>

<div id="{{$moduleName}}CtaBlock" class="btn-group pull-left cta-block no-margin col-md-12">
    <a id="{{$moduleName}}CancelBtn" class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
    @if(((isset($$element) && $elementIsEditable)) || (!isset($$element) && hasModulePermission($moduleName,'create')))
        <input name="redirect_success" type="hidden"
               value="{{ Request::has('redirect_success')?Request::get('redirect_success'): route($moduleName.".index") }}"/>
        <input name="redirect_fail" type="hidden"
               value="{{ Request::has('redirect_fail')?Request::get('redirect_fail'): URL::full() }}"/>
        <input name="ret" type="hidden" value="{{Request::get('ret')}}"/>
        <button id="{{$moduleName}}SubmitBtn" type="submit" class="btn btn-success">Save</button>
    @endif

    {{-- Delete modal --}}
    @if(isset($$element) && $$element->isDeletable())
        <div class="pull-right delete-cta no-padding">
            {!! deleteBtn(route($moduleName.".destroy",$$element->id),route($moduleName.".index")) !!}
        </div>
    @endif
    @if(isset($$element))
        <a target="_blank" class="btn btn-default pull-right"
           href="{{route("$moduleName.changes",$$element->id)}}">Change log</a>
    @endif
</div>