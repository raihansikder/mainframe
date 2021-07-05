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
<div class="btn-group pull-left ">

    {{--  Submit button  --}}
    <button type="submit" name="submit" class="btn btn-success" value="Run" id="run-report">Run Report</button>

    @if(request('submit'))

        {{--  Exel export button  --}}
        <a href="{!! $report->excelDownloadUrl() !!}"
           target="_blank" class="btn btn-default" type="button"
           title="Export to Excel"><i class="fa fa-file-excel-o" title="Export to Excel"></i></a>

        {{--  Print button  --}}
        <a href="{!! $report->printUrl() !!}"
           target="_blank" class="btn btn-default">
            <i class="fa fa-print" title="Print"></i></a>

        {{--  Save Report button  --}}
        @if($view->showSaveReportBtn())
            <a href="{!! $report->saveUrl() !!}" target="_blank" class="btn btn-default" title="Save report to run in future">
                <i class="fa fa-save" title="Save Report"></i></a>
        @endif

        <a href="{!! $report->jsonUrl() !!}" target="_blank" class="btn btn-default" title="Json">
            {...}</a>

        <a class="btn btn-default" href="{{url()->current()}}">Reset</a>

    @endif
</div>

@section('js')
    @parent
    <script>
        $("#run-report").click(function () {
            $(this).html('Please wait...');
        });
    </script>
@endsection