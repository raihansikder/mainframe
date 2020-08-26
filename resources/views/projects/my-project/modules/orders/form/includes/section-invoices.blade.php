<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Orders\Order $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
use App\Projects\MphMarket\Helpers\Money;
use App\Projects\MphMarket\Modules\Invoices\Invoice;
use App\Projects\MphMarket\Modules\Schedules\Schedule;
$sign = Money::sign($element->currency);
?>

<div class="clearfix" style="margin: 30px 0 0"></div>

<h3 class="pull-left">Invoices</h3>

@if(user()->can('create',Invoice::class))
    <?php
    $createLink = route('invoices.create')
        ."?order_id={$element->id}"
        ."&due_on=".now()->addDays(15)->format('Y-m-d')
        ."&percent=".decimal($element->percentRemaining(),0);
    ?>
    <a href="{{$createLink}}" class="btn btn-default pull-right" style="margin-top:10px">
        <i class="fa fa-plus"></i> &nbsp; Create</a>
@endif

<table id="tableQuoteItems" class="table">
    <thead>
    <tr id="header">
        <th style="width:8%;">NO.</th>
        <th style="width:32%;">TITLE</th>
        <th style="width:10%;">DATE</th>
        <th style="width:10%;">DUE ON</th>
        <th style="width:5%;">%</th>
        <th style="width:10%; text-align: right">PAYABLE</th>
        <th>STATUS</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($element->invoices as $item)
        <?php
        /** @var \App\Projects\MphMarket\Modules\Invoices\Invoice $item */
        $link = route('invoices.edit', $item->id)."?redirect_success=".URL::full();
        $payable = Money::print($item->payable, $sign)
        ?>
        <tr>
            <td><a href="{{$link}}">{{pad($item->id)}}</a></td>
            <td>{{$item->name}}</td>
            <td>{{formatDate($item->invoiced_at)}}</td>
            <td>{{formatDate($item->due_on)}}</td>
            <td>{{$item->percent}}%</td>
            <td style="text-align: right">{{$payable}}</td>
            <td>{{$item->status}}</td>
            <td style="text-align: right">
                <div class="col-md-12 no-padding no-margin btn-group">
                    {{-- Send --}}
                    <a class="btn btn-default pull-right btn-sm" href="{{route('invoices.send',$item->id)}}">
                        <i class="fa fa-envelope"></i>
                        @if($item->sent_at)
                            <small>(Last sent : {{$item->sent_at}})</small>
                        @endif
                    </a>

                    {{-- Print --}}
                    <a class="btn btn-default pull-right btn-sm" href="{{route('invoices.print-view',$item->id)}}" target="_blank">
                        <i class="fa fa-print"></i>
                    </a>

                    {{-- Print --}}
                    <a class="btn btn-default pull-right btn-sm" href="{{route('invoices.pdf-download',$item->id)}}" target="_blank">
                        <i class="fa fa-file-pdf-o"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<?php
$repeatOptions = kv(Schedule::$repeatOptions);
$dateTags = Schedule::$dateTags;
$breakDownTypes = ['Percent', 'Amount'];

$repeatDates = [];
for ($i = 1; $i <= 31; $i++) {
    $repeatDates[] = $i;
}
$repeatDates = array_merge($repeatDates, Schedule::$dateTags);

?>
<form id="formBulkInvoice" method="post" action="{{route('invoices.bulk-create')}}">
    @csrf
    @include('form.hidden',['var'=>['name'=>'order_id','value'=>$element->id]])
    @include('form.date',['var'=>['name'=>'starts_on','label'=>'Starts from',]])
    @include('form.select-array',['var'=>['name'=>'repeat','label'=>'Repeat', 'options'=>$repeatOptions, 'div'=>'col-md-2', 'class'=>'validate[required]']])
    @include('form.select-array',['var'=>['name'=>'repeat_date','label'=>'Invoice Date', 'options'=>kv($repeatDates), 'div'=>'col-md-2', 'class'=>'validate[required]']])
    {{-- @include('form.tags',['var'=>['name'=>'repeat_dates','label'=>'On','tags'=>$dateTags,'div'=>'col-md-3', 'class'=>'validate[required]']])--}}
    @include('form.select-array',['var'=>['name'=>'breakdown','label'=>'Breakdown by', 'options'=>kv($breakDownTypes), 'div'=>'col-md-2', 'class'=>'validate[required]']])
    @include('form.text',['var'=>['name'=>'value','label'=>'Value','div'=>'col-md-2', 'class'=>'validate[required]']])
    <button type="submit" class="btn btn-default" style="margin-top:20px">Generate</button>
</form>

@section('js')
    @parent
    <script>
        $('#formBulkInvoice').validationEngine();
    </script>
@endsection



