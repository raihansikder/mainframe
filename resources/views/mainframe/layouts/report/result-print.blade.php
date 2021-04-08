<?php
/**
 * @var \Illuminate\Database\Query\Builder $dataSource
 * @var \Illuminate\Pagination\LengthAwarePaginator $result
 * @var int $total Total number of rows returned
 * @var \App\Mainframe\Features\Report\ReportViewProcessor $view
 * @var string $path
 */
?>
@include($view->initFunctionsPath())

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
    <title>Report</title>
    <link rel="stylesheet" href="{{ asset('mainframe/css/print-report.css') }}" type="text/css"/>
    <meta charset="UTF-8"/>
</head>
<body lang=EN-US>
<div style="width: 150px;float: left; font-size: 14px">
    <input id="btnPrint" type="button" value="Print this page" onclick="printPage()"/>
</div>
<div style="clear: both"></div>

@section('content')
    @if(request('submit')=='Run' && isset($result))

        Total {{$total}} items found.
        <div class="clearfix"></div>
        <div class="table-responsive">
            @if(count($result))
                <table class="table table-condensed" id="report-table">
                    <thead>
                    <tr>
                        @foreach ($aliasColumns as $column)
                            <th>{{$column}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($result as $row)
                        <tr>
                            @foreach ($selectedColumns as $column)
                                <td>
                                    @if(isset($row->$column))
                                        {!! $view->cell($column, $row) !!}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $result->setPath(URL::full())->links() ?? '' }}
            @endif
        </div>
    @endif
@show
</body>
{{-- JS --}}
<script type="text/javascript">
    function printPage() {
        var printButton = document.getElementById("btnPrint");
        printButton.style.visibility = 'hidden';
        window.print();
        printButton.style.visibility = 'visible';
    }
</script>
</html>