@extends('projects.my-project.layouts.module.grid.template')

@section('title')
    <span style="padding-right: 20px">{{$module->title}}</span>

    @if($user->can('create',$model))
        {{--<a href="{{route("$module->name.create")}}" data-toggle="tooltip"--}}
           {{--title="Create a new {{lcfirst(Str::singular($module->title))}}">--}}
            {{--<i class="fa fa-plus-circle"></i>--}}
        {{--</a>--}}
    @endif

    @if($user->can('view-any',$model))
        <a href="{{\App\Mainframe\Modules\Reports\Report::defaultForModule($module->id)}}"
           class="pull-right"
           title="View advanced report with filters, excel export etc."
           data-toggle="tooltip"
           target="_blank">
            <i class="fa fa-file-text"></i> &nbsp;
        </a>
    @endif
@endsection
@section('content-top')
    <form action="{{route($module->name.'.index')}}" method="get">
        <?php
        $stockStatuses = kv(\App\Projects\MphMarket\Modules\StockItems\StockItem::$statuses);
        $deliveryStatuses = kv(\App\Projects\MphMarket\Modules\Deliverables\Deliverable::$statuses);
        ?>
        @include('form.datetime',['var'=>['name'=>'warranty_from','label'=>'Warranty Start Date']])
        @include('form.datetime',['var'=>['name'=>'warranty_till','label'=>'Warranty End Date']])
        @include('form.text',['var'=>['name'=>'product','label'=>'Product Id or Name']])
        @include('form.select-array-multiple',['var'=>['name'=>'stock_status','label'=>'Stock Status', 'options'=>$stockStatuses]])
        @include('form.select-array-multiple',['var'=>['name'=>'delivery_status','label'=>'Delivery Status', 'options'=>$deliveryStatuses]])
        <button class="btn btn-default" style="margin-top:20px" type="submit">Filter</button>
        <a class="btn btn-default" style="margin-top:20px; background: white" href="{{route($module->name.'.index')}}">Reset</a>
    </form>
    <div class="clearfix"></div>
@endsection

@section('js')
    @parent
    <script>
        // Activate select2
        $('select[id=stock_status]').select2();
        $('select[id=delivery_status]').select2();
    </script>
@endsection