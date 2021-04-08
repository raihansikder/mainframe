@extends('mainframe.layouts.report.template')
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

@section('content')

    {{-- Report top section with filter, CTA, column selections--}}
    @include($view->filterPath())

    @if(request('submit')=='Run' && isset($result))
        Total {{$total}} items found.
        <div class="clearfix"></div>
        <div class="table-responsive">

            @if(count($result))
                <table class="table table-condensed" id="report-table">
                    <thead>
                    <tr>
                        @foreach ($aliasColumns as $alias)
                            <th>{!! $view->column($loop->index) !!}</th>
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
@endsection

@section('js')
    @parent
@endsection