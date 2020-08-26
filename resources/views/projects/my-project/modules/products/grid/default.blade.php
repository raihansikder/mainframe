@extends('projects.my-project.layouts.module.grid.template')

@section('content-top')
    @if(!user()->ofVendor())
        <form action="{{route($module->name.'.index')}}" method="get">
            @include('form.select-model-multiple',['var'=>['name'=>'vendor_id','label'=>'Vendor', 'table'=>'vendors']])
            <button class="btn btn-default" style="margin-top:20px" type="submit">Filter</button>
            <a class="btn btn-default" style="margin-top:20px; background: white" href="{{route($module->name.'.index')}}">Reset</a>
        </form>
    @endif
    <div class="clearfix"></div>
@endsection

@section('js')
    @parent
    <script>
        // Activate select2
        $('select[id=vendor_id]').select2();
    </script>
@endsection