<?php
/**
 * @var $data_source   string Table/DB view name (i.e. v_users, users)
 * @var $results       \Illuminate\Pagination\LengthAwarePaginator
 * @var $total         integer Total number of rows returned
 * @var $base_dir      string
 */
?>
@include($path.'.includes.init-functions')
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
    <title>Report</title>
    <link rel="stylesheet" href="{{ asset('mainframe/css/print-report.css') }}" type="text/css"/>
    <meta charset="UTF-8"/>
</head>
<body lang=EN-US>
<div style="width: 150px;float: left; font-size: 14px">
    <input id="btnPrint" type="button" value="Print this page" onclick="printpage()"/>
</div>
@section('content')
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
@show
</body>
{{-- JS --}}
<script type="text/javascript">
    function printpage() {
        var printButton = document.getElementById("btnPrint");
        printButton.style.visibility = 'hidden';
        window.print();
        printButton.style.visibility = 'visible';
    }
</script>
</html>