<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\Mainframe\Modules\SuperHeroes\SuperHero $element
 */
?>

<div class="clearfix"></div>

<div id="{{$module->name}}CtaBlock" class="btn-group pull-left cta-block no-margin col-md-12">

    {{--  Save button    --}}
    @if(((isset($element) && $editable)) || (!isset($element) && hasModulePermission($module->name,'create')))

        <input name="redirect_success" type="hidden"
               value="{{ request('redirect_success',route($module->name.".index") ) }}"/>

        <input name="redirect_fail" type="hidden"
               value="{{ request('redirect_fail',URL::full())  }}"/>

        <input name="ret" type="hidden"
               value="{{Request::get('ret')}}"/>

        <button id="{{$module->name}}SubmitBtn" type="submit" class="btn btn-success">
            <i class="fa fa-check"></i> &nbsp;&nbsp;&nbsp;Save
        </button>

    @endif

    {{-- Delete modal open button--}}
    @if(isset($element->id) && user()->can('delete',$element))
        <div class="pull-right delete-cta no-padding">
            <?php
            $var = [
                'route' => route($module->name.".destroy", $element->id),
                'redirect_success' => route($module->name.".index"),
            ];
            ?>
            @include('mainframe.form.delete-button',['var'=>$var])
        </div>
    @endif

    {{--  Change log button      --}}
    @if(isset($element->id))
        <a target="_blank" class="btn  bg-white pull-right"
           href="{{route("$module->name.changes",$element->id)}}">Change log</a>
    @endif
</div>