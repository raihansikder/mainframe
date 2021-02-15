@extends('mainframe.layouts.report.template')
<?php
/**
 * @var \Illuminate\Database\Query\Builder $dataSource
 * @var \Illuminate\Pagination\LengthAwarePaginator $result
 * @var int $total Total number of rows returned
 * @var string $path
 * @var \App\Mainframe\Features\Report\ReportViewProcessor $view
 */
?>

@section('css')
    @parent
    <style>
        .content {
            padding-top: 0
        }
    </style>
@endsection

@include($path.'.includes.init-functions')

@section('content')
    @include($path.'.includes.filters')

    @if(Request::get('submit')==='Run' && isset($result))

        Total {{$total}} items found.
        <div class="clearfix"></div>
        <div class="table-responsive">
            @if(count($result))
                <table class="table table-condensed" id="report-table">
                    <thead>
                    <tr>
                        @foreach ($aliasColumns as $col)
                            <th>{{$col}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($result as $row)
                        <tr>
                            @foreach ($selectedColumns as $column)
                                <td>
                                    @if(isset($row->$column))
                                        {!! $view->cell($column, $row,  route($module->name.'.edit',$row->id) ) !!}
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