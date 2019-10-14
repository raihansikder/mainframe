<?php
/**
 * @var $data_source                         string Table/DB view name (i.e. v_users, users)
 * @var $sql                                 string SQL query
 * @var $results                             \Illuminate\Pagination\LengthAwarePaginator Main array where rows of results are stored
 * @var $sql_count                           string SQL query
 * @var $total                               integer Total number of rows returned
 * @var $group_by                            string 'GROUP BY col1,col2'
 * @var $order_by                            string
 * @var $limit                               integer
 * @var $rows_per_page                       integer
 * @var $filters                             string
 * @var $column_aliases                      array
 * @var $columns_to_show                 array
 * @var $data_source_fields                  array
 * @var $fields                              array
 * @var $fields_csv_esc                      string
 * @var $base_dir                            string
 * @var $result_blade                        string
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
    @include('mainframe.modules.base.report-old.init-functions')
    <link rel="stylesheet" href="{{ asset('assets/css/printreport.css') }}" type="text/css"/>
    <meta charset="UTF-8"/>
</head>
<body lang=EN-US>
<div style="width: 150px;float: right;">
    <input id="printpagebutton" type="button" value="Print this page" onclick="printpage()"/>
</div>
@if(Request::get('submit')==='Run' && count($results))
    <table class="table table-bordered table-mailbox table-condensed table-hover" id="report-table">
        <thead>
        <tr>
            @foreach ($column_aliases as $column_alias)
                <th>{{$column_alias}}</th>
            @endforeach

            @if (strlen($group_by))
                <th>Total</th>
            @endif
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach ($results as $result)
            <tr>
                @foreach ($columns_to_show as $column)
                    <td>
                        @if(isset($result->$column))
                            <?php echo transformRow($column, $result, $result->$column, $data_source)?>
                        @endif
                    </td>
                @endforeach
                {{-- if SQL 'GROUP' is set then post stats (male, female, filled etc) are shown --}}
                @if (strlen($group_by))
                    <td>{{number_format($result->total)}}</td>
                @endif
                {{-- end stat ounts --}}
            </tr>
        @endforeach
        <tr>
            @if (strlen($group_by))
                @foreach ($columns_to_show as $column)
                    <td></td>
                @endforeach
                <td></td>
                <td>Total : <b>{{number_format($total)}}</b></td>
            @endif
        </tr>
        </tbody>
    </table>
@endif
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