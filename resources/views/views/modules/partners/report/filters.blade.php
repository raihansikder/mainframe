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
                @include('form.input-text',['var'=>['name'=>'created_at_from','label'=>'On-boarded (from)', 'container_class'=>'col-md-2','params'=>['class'=>'datepicker'] ]])
                @include('form.input-text',['var'=>['name'=>'created_at_till','label'=>'On-boarded (till)', 'container_class'=>'col-md-2','params'=>['class'=>'datepicker'] ]])

                @include('form.select-array',['var'=>['name'=>'is_published','label'=>'Published?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-sm-2']])
                @include('form.select-array',['var'=>['name'=>'is_active','label'=>'Active?', 'options'=>['0'=>'No','1'=>'Yes'],'container_class'=>'col-sm-2']])

                <?php
                $var = [
                    'name' => 'id',
                    'label' => 'Partner',
                    'value' => Request::get('id') ?? [],
                    'query' => new \App\Partner,
                    'name_field' => 'name',
                    'params' => ['multiple'],
                    'container_class' => 'col-sm-2'
                ];
                ?>
                @include('form.select-model', compact('var'))
                <?php
                $var = [
                    'name' => 'country_id',
                    'label' => 'Country',
                    'value' => Request::get('country_id') ?? [],
                    'query' => new \App\Country,
                    'name_field' => 'name',
                    'params' => ['multiple'],
                    'container_class' => 'col-sm-2'
                ];
                ?>
                @include('form.select-model', compact('var'))

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