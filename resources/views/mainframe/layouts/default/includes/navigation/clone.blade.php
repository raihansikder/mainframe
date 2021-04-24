@if($element->isCreated())
    <form class="pull-right" method="post" action="{{route($module->name.'.clone',$element->id)}}">
        @csrf
        <button class="btn btn-default" type="submit"><i class="fa fa-copy"></i> Clone</button>
    </form>
@endif