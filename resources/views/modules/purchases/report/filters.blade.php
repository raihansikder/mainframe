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

            <li><a href="#tab_advanced" data-toggle="tab">Fields</a></li>
            <li class="pull-right">
                @include('modules.base.report.cta')
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active " id="tab_minimize">

                @include('form.input-text',['var'=>['name'=>'report_name','label'=>'Report name', 'container_class'=>'col-sm-10']])

                @include('form.select-array',['var'=>['name'=>'rows_per_page','label'=>'Rows per page','options'=>kv([10,25,50,100]),'container_class'=>'pull-right col-md-2']])
            </div>

            <div class="tab-pane" id="tab_basic">
                <div class="clearfix"></div>

                @include('form.select-model',['var'=>['name'=>'partner_id','label'=>'Partner(Brand)', 'table'=>'partners', 'container_class'=>'col-sm-6','editable'=>true,'params'=>['multiple'=>true]]])
                @include('form.select-model',['var'=>['name'=>'charity_id','label'=>'Charity', 'table'=>'charities', 'container_class'=>'col-sm-6','editable'=>true,'params'=>['multiple'=>true]]])

                <div class="clearfix"></div>

                @include('form.select-array',['var'=>['name'=>'partner_env','label'=>'Env', 'options'=>array_merge([' '=>' '],kv(\App\Partner::$statuses)), 'container_class'=>'col-sm-3']])
                @include('form.select-array',['var'=>['name'=>'is_approved','label'=>'Approved?', 'options'=>[' '=>' ','0'=>'No','1'=>'Yes'],'container_class'=>'col-sm-3']])

                @include('form.input-text',['var'=>['name'=>'from_date','label'=>'From Date', 'container_class'=>'col-sm-3','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'to_date','label'=>'To Date', 'container_class'=>'col-sm-3','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'qualifying_date_till','label'=>'Qualifying Date', 'container_class'=>'col-sm-3','params'=>['class'=>'datepicker']]])
                @include('form.select-array',['var'=>['name'=>'has_aiddeclaration','label'=>'Has Aiddeclaration?', 'options'=>[''=>'Select','1'=>'Yes','0'=>'No',],'container_class'=>'col-sm-3']])

                @include('form.select-array',['var'=>['name'=>'route','label'=>'Route', 'options'=>array_merge([''=>'Select'],kv(\App\Partner::$routes)), 'container_class'=>'col-sm-3']])
                <?php
                $var = [
                    'name' => 'affiliate_id',
                    'label' => 'Affiliate',
                    'value' => Request::get('affiliate_id') ?? [],
                    'query' => new \App\Affiliate,
                    'name_field' => 'name',
                    'params' => ['multiple'],
                    'container_class' => 'col-sm-3'
                ];
                ?>
                @include('form.select-model', compact('var'))
                @include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])

                <div class="clearfix"></div>

            </div>
            <div class="tab-pane" id="tab_advanced">
                @include('modules.base.report.advanced')
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</form>

@section('js')
    @parent
@endsection
