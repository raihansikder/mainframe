@extends('mainframe.layouts.report.template')
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

@section('title')
    @if(request('report_name'))
        Report - {{request('report_name')}}
    @endif
@endsection

@section('content')

    {{-- Report top section with filter, CTA, column selections--}}
    @include($report->filterPath())

    @if(request('submit')=='Run' && isset($result))

        Total {{$total}} items found.
        <div class="clearfix"></div>
        <div class="table-responsive">

            @if(count($result))
                <table class="table table-condensed" id="report-table">
                    <thead>
                    <tr>
                        @foreach ($aliasColumns as $alias)
                            <th>{!! $report->columnTitle($loop->index) !!}</th>
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
@endsection

@section('js')
    @parent
@endsection