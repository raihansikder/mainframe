@extends('template.report')
<?php
/**
 * @var $data_source   string Table/DB view name (i.e. v_users, users)
 * @var $results       \Illuminate\Pagination\LengthAwarePaginator
 * @var $total         integer Total number of rows returned
 * @var $base_dir      string
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

@include($base_dir.'.init-functions')

@section('content')
    @include($base_dir.'.filters')
    @if(Request::get('submit')==='Run')

        Total {{$total}} items found.
        <div class="clearfix"></div>
        <div class="table-responsive">
            @if(count($results))
                <table class="table table-condensed" id="report-table">
                    <thead>
                    <tr>
                        @foreach ($alias_columns as $col)
                            <th>{{$col}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $result)
                        <tr>
                            @foreach ($show_columns as $col)
                                <td>
                                    @if(isset($result->$col))
                                        {!! transformRow($col, $result, $result->$col, 'invoices') !!}
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