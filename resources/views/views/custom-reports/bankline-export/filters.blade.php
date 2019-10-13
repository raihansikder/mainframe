@section('css')
    @parent
    <style>
        .nav-tabs-custom > .tab-content {
            padding-bottom: 0
        }
    </style>
@stop

<form method="get">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_minimize" data-toggle="tab"><i class="fa fa-minus"></i></a></li>
            <li><a href="#tab_basic" data-toggle="tab">Filters</a></li>
            {{--            <li><a href="#tab_advanced" data-toggle="tab">Fields</a></li>--}}
            <li class="pull-right">
                @include('modules.base.report.cta')
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active " id="tab_minimize">
                @include('form.input-text',['var'=>['name'=>'report_name','label'=>'Report name', 'container_class'=>'col-sm-10']])
                @include('form.select-array',['var'=>['name'=>'rows_per_page','label'=>'Rows per page','options'=>kv([10,25,50,100]),'container_class'=>'pull-right col-md-2']])
                <div class='clearfix'></div>
                @include('form.select-array',['var'=>['name'=>'invoice_currency','label'=>'Currency', 'options'=>kv(\App\Invoice::$currencies),'container_class'=>'col-sm-2']])
                @include('form.select-array',['var'=>['name'=>'beneficiary_type','label'=>'Beneficiary type', 'options'=>['charity'=>'Charity','recommender'=>'Recommender',],'container_class'=>'col-sm-2']])
                @include('form.select-array',['var'=>['name'=>'is_test','label'=>'Show test entries', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-2']])

            </div>
            <div class="tab-pane" id="tab_basic">

                {{--                @include('form.select-array',['var'=>['name'=>'invoice_status','label'=>'Status', 'options'=>kv(\App\Invoice::$statuses),'container_class'=>'col-sm-2']])--}}
                {{--                @include('form.select-array',['var'=>['name'=>'transfer_method','label'=>'Transfer method', 'options'=>kv(\App\Invoice::$transfer_methods),'container_class'=>'col-sm-2']])--}}

                @include('form.input-text',['var'=>['name'=>'created_at_from','label'=>'Generated (from)', 'container_class'=>'col-md-2','params'=>['class'=>'datepicker'] ]])
                @include('form.input-text',['var'=>['name'=>'created_at_till','label'=>'Generated (till)', 'container_class'=>'col-md-2','params'=>['class'=>'datepicker'] ]])



                <?php
                $var = [
                    'name' => 'country_id',
                    'label' => 'Country',
                    'value' => Request::get('country_id') ?? [],
                    'query' => new \App\Country,
                    'name_field' => 'name',
                    'params' => ['multiple', 'id' => 'groups'],
                    'container_class' => 'col-sm-2'
                ];
                ?>
                {{--                @include('form.select-model', compact('var'))--}}

                <?php
                $var = [
                    'name' => 'charity_id',
                    'label' => 'Charity',
                    'value' => Request::get('charity_id') ?? [],
                    'query' => new \App\Partner,
                    'name_field' => 'name',
                    'params' => ['multiple', 'id' => 'groups'],
                    'container_class' => 'col-sm-2'
                ];
                ?>
                {{--                @include('form.select-model', compact('var'))--}}
                {{--                @include('form.input-text',['var'=>['name'=>'recommender_user_id','label'=>'Recommender ID', 'container_class'=>'col-sm-2']])--}}


            </div>
            {{--            <div class="tab-pane" id="tab_advanced">--}}
            {{--                @include('modules.base.report.advanced')--}}
            {{--            </div>--}}
        </div>
        <div class="clearfix"></div>
    </div>
</form>

@section('js')
    @parent
@endsection