@extends('projects.my-project.layouts.module.grid.template')

@section('title')
    <span style="padding-right: 20px">{{$module->title}}</span>

    @if($user->can('view-report',$model))
        <a href="{{\App\Mainframe\Modules\Reports\Report::defaultForModule($module->id)}}"
           class="pull-right module-list-btn {{$module->name.'-module-list-btn'}}"
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
        $statuses = kv(\App\Projects\MphMarket\Modules\Deliverables\Deliverable::$statuses);
        ?>
        @include('form.datetime',['var'=>['name'=>'delivered_at_from','label'=>'Delivered At From']])
        @include('form.datetime',['var'=>['name'=>'delivered_at_till','label'=>'Delivered At Till']])
        @include('form.text',['var'=>['name'=>'order_id','label'=>'Order Id']])
        @include('form.text',['var'=>['name'=>'product','label'=>'Product Id or Name']])
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