<div class="clearfix"></div>

<div id="{{$module->name}}CtaBlock" class="btn-group pull-left cta-block no-margin col-md-12">
    <a id="{{$module->name}}CancelBtn" class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
    @if(((isset($$element) && $elementIsEditable)) || (!isset($$element) && hasModulePermission($module->name,'create')))
        <input name="redirect_success" type="hidden"
               value="{{ Request::has('redirect_success')?Request::get('redirect_success'): route($module->name.".index") }}"/>
        <input name="redirect_fail" type="hidden"
               value="{{ Request::has('redirect_fail')?Request::get('redirect_fail'): URL::full() }}"/>
        <input name="ret" type="hidden" value="{{Request::get('ret')}}"/>
        <button id="{{$module->name}}SubmitBtn" type="submit" class="btn btn-success">Save</button>
    @endif

    {{-- Delete modal --}}
    @if(isset($element->id) && $element->isDeletable())
        <div class="pull-right delete-cta no-padding">
            {!! deleteBtn(route($module->name.".destroy",$element->id),route($module->name.".index")) !!}
        </div>
    @endif
    @if(isset($element->id))
        <a target="_blank" class="btn btn-default pull-right"
           href="{{route("$module->name.changes",$element->id)}}">Change log</a>
    @endif
</div>