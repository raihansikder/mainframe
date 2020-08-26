@extends('projects.my-project.layouts.report.template')
<?php
/**
 * @var $dataSource  string Table/DB view name (i.e. v_users, users)
 * @var $result      \Illuminate\Pagination\LengthAwarePaginator
 * @var $total        integer Total number of rows returned
 * @var $path     string
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
                            @foreach ($selectedColumns as $col)
                                <td>
                                    @if(isset($row->$col))
                                        {!! transformRow($col, $row, $row->$col, $module->name ) !!}
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