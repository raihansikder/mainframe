{{-- Date selector form--}}
<?php
$range_text = 'Date range - All';
if (Request::get('date_range_from') || Request::get('date_range_to')) {
    $range_text = Request::get('date_range_from').'-'.Request::get('date_range_to');
}
?>

<form method="get">
    <div class="form-group pull-right">
        <div class="input-group">
            <button type="button" class="btn btn-sm btn-default pull-left" id="daterange-btn">
                <span>{{$range_text}}</span>
                <i class="fa fa-caret-down"></i>
            </button>
            <button class="btn btn-sm btn-success pull-left" type="submit">Submit</button>
            <a class="btn btn-sm btn-default pull-left" type="submit" href="{{Request::url()}}">Reset</a>
            <input id="date_range_from" type="hidden" name="date_range_from"
                   value="{{Request::get('date_range_from')}}"/>
            <input id="date_range_to" type="hidden" name="date_range_to" value="{{Request::get('date_range_to')}}"/>
        </div>
    </div>
</form>


@section('js')
    @parent
    <script>
        //http://www.daterangepicker.com/
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#date_range_from').val(start.format('YYYY-MM-DD'));
                $('#date_range_to').val(end.format('YYYY-MM-DD'));
                //$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $('#daterange-btn span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            }
        );
    </script>

    @if(Request::get('date_range_from') && Request::get('date_range_to'))
        <script>
            //Date range will be shown as per the given inputs
            var date_from = new Date($('#date_range_from').val());
            var date_to = new Date($('#date_range_to').val());
            var formatted_date_from = (date_from.getMonth() + 1) + "/" + date_from.getDate() + "/" + date_from.getFullYear();
            var formatted_date_to = (date_to.getMonth() + 1) + "/" + date_to.getDate() + "/" + date_to.getFullYear();
            $('#daterange-btn').data('daterangepicker').setStartDate(formatted_date_from);
            $('#daterange-btn').data('daterangepicker').setEndDate(formatted_date_to);
        </script>
    @endif
@endsection