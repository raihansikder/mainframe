@extends('mainframe.layouts.report.layout')
<?php
/**
 * @var $dataSource  string Table/DB view name (i.e. v_users, users)
 * @var $results      \Illuminate\Pagination\LengthAwarePaginator
 * @var $total        integer Total number of rows returned
 * @var $baseDir     string
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

@include($baseDir.'.includes.init-functions')

@section('content')
    @include($baseDir.'.includes.filters')
    @if(Request::get('submit')==='Run')

        Total {{$total}} items found.
        <div class="clearfix"></div>
        <div class="table-responsive">
            @if(count($results))
                <table class="table table-condensed" id="report-table">
                    <thead>
                    <tr>
                        @foreach ($aliasColumns as $col)
                            <th>{{$col}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $result)
                        <tr>
                            @foreach ($showColumns as $col)
                                <td>
                                    @if(isset($result->$col))
                                        {!! transformRow($col, $result, $result->$col, $dataSource) !!}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $results->setPath(URL::full())->links() ?? '' }}
            @endif
        </div>
    @endif
@endsection

@section('js')
    @parent
@endsection