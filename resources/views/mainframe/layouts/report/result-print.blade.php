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
    <link rel="stylesheet" href="{{ asset('assets/css/printreport.css') }}" type="text/css"/>
    <meta charset="UTF-8"/>
</head>
<body lang=EN-US>
<div style="width: 150px;float: left; font-size: 14px">
    <input id="printpagebutton" type="button" value="Print this page" onclick="printpage()"/>
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
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden'
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print();
        //Set the print button to 'visible' again
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
</html>