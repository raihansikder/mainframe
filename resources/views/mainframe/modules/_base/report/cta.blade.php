<?php
/**
 * @var $currentModule \App\Module
 */
?>
<div class="btn-group pull-left ">
    <button type="submit" name="submit" class="btn btn-success" value="Run" id="run-report">Run Report</button>
    @if(Request::has('submit'))
        <a target="_blank" class="btn btn-default" type="button" href="<?php echo URL::full()?>&ret=excel"
           title="Export to Excel"><i class="fa fa-file-excel-o" title="Export to Excel"></i></a>
        <a target="_blank" class="btn btn-default" href="<?php echo URL::full()?>&ret=print">
            <i class="fa fa-print" title="Print"></i></a>
        @if(Request::has('submit') && hasPermission('reports.create'))
            <?php
            $report_save_url = route('reports.create');
            $report_save_url .= '?title=' . Request::get('report_name');
            $report_save_url .= '&module_id=' . $module->id;
            $report_save_url .= '&parameters=' . urlencode(str_replace(route('home'), '', URL::full()));
            ?>
            <a target="_blank" class="btn btn-default" href="{{$report_save_url}}">
                <i class="fa fa-save" title="Save Report"></i></a>
        @endif
    @endif
</div>

@section('js')
    @parent
    <script>
        $("#run-report").click(function(){
            $(this).html('Please wait...');
        });
    </script>
    @endsection