<?php
/**
 * @var \App\Mainframe\Features\Report\ReportBuilder $report
 * @var \Illuminate\Database\Query\Builder $dataSource
 * @var \Illuminate\Pagination\LengthAwarePaginator $result
 * @var int $total Total number of rows returned
 * @var \App\Mainframe\Features\Report\ReportViewProcessor $view
 * @var string $path
 */
?>
@section('css')
    @parent
    <!--suppress JSJQueryEfficiency -->
    <style>
        #tab_advanced .select2-container-multi .select2-choices .select2-search-choice {
            width: 98%;
        }
    </style>
@endsection

@include('form.textarea',['var'=>['name'=>'columns_csv','label'=>'Columns', ['params'=>['class'=>'tag']],'div'=>'col-md-3']])
@include('form.textarea',['var'=>['name'=>'alias_columns_csv','label'=>'Titles', ['params'=>['class'=>'tag']],'div'=>'col-md-3']])
{{--@include('form.input.textarea',['var'=>['name'=>'additional_conditions','label'=>'Additional conditions','div'=>'col-md-2']])--}}
{{--@include('form.input.text',['var'=>['name'=>'group_by','label'=>'Group by','div'=>'col-md-2']])--}}
@include('form.text',['var'=>['name'=>'order_by','label'=>'Order by','div'=>'col-md-2']])
@include('form.text',['var'=>['name'=>'group_by','label'=>'Group by','div'=>'col-md-2']])

<div class="clearfix"></div>
{{--<div class="col-md-12">--}}
{{--    <h5>Generated SQL query</h5>--}}
{{--    <div class="alert-block">--}}
{{--        <pre class="small">@if(isset($sql)){{$sql}}@endif</pre>--}}
{{--    </div>--}}
{{--    <h5>API URL--}}
{{--        <small>(X-Auth-token based authentication)</small>--}}
{{--    </h5>--}}
{{--    <div class="alert-block">--}}
{{--        <a target="_blank" href="{{genericReportApiUrl()}}">{{genericReportApiUrl()}}</a>--}}
{{--    </div>--}}
{{--    <h5>API URL--}}
{{--        <small>(Reports for any authenticated users)</small>--}}
{{--    </h5>--}}
{{--    <div class="alert-block">--}}
{{--        <a target="_blank" href="{{genericReportJsonUrl()}}">{{genericReportJsonUrl()}}</a>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="clearfix"></div>--}}


@section('js')
    @parent
    <script type="text/javascript">

        $("textarea[name=columns_csv]").select2({
            tags: [{!!   "'". implode("','",$columnOptions). "'" !!}],
            tokenSeparators: [',']
        });
        $("textarea[name=alias_columns_csv]").select2({
            tags: [],
            tokenSeparators: [',']
        });

        $("textarea[name=columns_csv]").select2("container").find("ul.select2-choices").sortable({
            start: function () {
                $("textarea[name=columns_csv]").select2("onSortStart");
            },
            update: function () {
                $("textarea[name=columns_csv]").select2("onSortEnd");
            }
        });

        $("textarea[name=alias_columns_csv]").select2("container").find("ul.select2-choices").sortable({
            start: function () {
                $("textarea[name=alias_columns_csv]").select2("onSortStart");
            },
            update: function () {
                $("textarea[name=alias_columns_csv]").select2("onSortEnd");
            }
        });
    </script>
@endsection