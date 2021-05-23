<?php
/**
 * @var \App\Mainframe\Features\Report\ReportBuilder $report
 * @var \App\Mainframe\Features\Report\ReportViewProcessor $view
 * @var array $columnOptions
 * @var array $selectedColumns
 * @var array $aliasColumns
 * @var \Illuminate\Pagination\LengthAwarePaginator $result
 * @var int $total Total number of rows returned
 */
?>
@include($report->initFunctionsPath())

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
    <title>Report</title>
    <link rel="stylesheet" href="{{ asset('mainframe/css/print-report.css') }}" type="text/css"/>
    <meta charset="UTF-8"/>
</head>
<body lang=EN-US>
@include('mainframe.layouts.default.includes.print-btn')
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
                                    {!! $report->cell($column, $row) !!}
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
</html>