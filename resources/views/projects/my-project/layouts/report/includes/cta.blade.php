<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 */

$excelUrl = URL::full()."&ret=excel";
$printUrl = URL::full()."&ret=print";
$saveUrl = route('reports.create')
    .'?title='.request('report_name')
    .'&module_id='.$module->id
    .'&parameters='.urlencode(str_replace(route('home'), '', URL::full()));

?>
<div class="btn-group pull-left ">
    {{--  Submit button  --}}

    <button type="submit" name="submit" class="btn btn-success" value="Run" id="run-report">Run Report</button>

    @if(request('submit'))


        {{--  Exel export button  --}}
        <a href="{{$excelUrl}}"
           target="_blank" class="btn btn-default" type="button"
           title="Export to Excel"><i class="fa fa-file-excel-o" title="Export to Excel"></i></a>


        {{--  Print button  --}}
        <a href="{{$printUrl}}"
           target="_blank" class="btn btn-default">
            <i class="fa fa-print" title="Print"></i></a>

        {{--  Save Report button  --}}
        @if($user->can('view-any',\App\Mainframe\Modules\Reports\Report::class))
            <a href="{{$saveUrl}}" target="_blank" class="btn btn-default">
                <i class="fa fa-save" title="Save Report"></i></a>
        @endif

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