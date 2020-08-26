@extends('projects.my-project.layouts.module.grid.template')

@section('content-top')
    <form action="{{route($module->name.'.index')}}" method="get">
        <?php
        $statuses = kv(\App\Projects\MphMarket\Modules\Orders\Order::$statuses);
        ?>
        @include('form.select-array-multiple',['var'=>['name'=>'status','label'=>'Status', 'options'=>$statuses]])
        <button class="btn btn-default" style="margin-top:20px" type="submit">Filter</button>
        <a class="btn btn-default" style="margin-top:20px; background: white" href="{{route($module->name.'.index')}}">Reset</a>
    </form>
    <div class="clearfix"></div>
@endsection

@section('js')
    @parent
    <script>
        // Activate select2
        $('select[id=status]').select2();
    </script>
@endsection