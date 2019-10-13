<?php
/**
 * @var $charity \App\Charity
 */
?>
<b>Following is a list of donations from recent purchases that are yet to be invoiced/transferred.</b><br/>
Invoices will be automatically generated on due time and transfer will be processed. To manually create
invoice select entries from the list and click on 'Create Invoice

{{ Form::open(['id'=>'generate_invoice','route' => 'invoices.store']) }}
<table id="tbl_purchases_not_invoiced" class="table module-grid table table-bordered table-striped"
       width="100%">
    <thead>
    <tr>
        <th></th>
        <th>Purchase</th>
        <th>Date</th>
        <th>Brand</th>
        <th>Product</th>
        <th>Recommender</th>
        <th style="width: 80px">Amount</th>
        <th>Approved</th>
        <th>Env</th>
    </tr>
    </thead>
    <tbody>
    @foreach($purchases_not_invoiced as $purchase)
        <?php
        /** @var \App\Purchase $purchase */
        $commission_css = $purchase->charity_donation_in_charity_currency > 0 ? 'bg-green disabled color-palette' : '';
        $approved_css = $purchase->is_approved === 1 ? 'bg-green disabled color-palette' : '';
        $env_css = $purchase->partner_env === 'Live' ? 'bg-green disabled color-palette' : '';

        /** Determine normal or split earning  */
        $earning = $purchase->earningOfCharity($charity);
        $earning_currency = $purchase->charityEarningCurrency($charity);
        ?>

        <tr>
            <td>
                @if($purchase->charity_donation_in_charity_currency >0 && $purchase->isInvoicable())
                    <input name="purchase_id[]" type="checkbox" class="purchase_id_checkbox"
                           value="{{$purchase->id}}"/>
                @endif
            </td>
            <td>
                <a href="{{route('purchases.show',$purchase->id)}}" target="_blank">
                    {{ pad($purchase->id) }}
                </a>
            </td>
            <td>{{ $purchase->purchased_at }}</td>
            <td>{!! $purchase->partner->name !!}</td>
            <td>{!! $purchase->product_name !!}</td>
            <td>
                @if(isset($purchase->recommender))
                    {{ $purchase->recommender->email }}
                @endif
            </td>
            <td class="{{$commission_css}}">
                @if($purchase->isBuyerCharity($charity))
                    <code>SP</code>
                @endif
                <span class="pull-right">{{symbol($earning_currency).money($earning)}}</span>
            </td>
            <td class="{{$approved_css}}">{{ $purchase->is_approved ? 'Yes':'No' }}</td>
            <td class="{{$env_css}}">{{ $purchase->partner_env }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class='clearfix'></div>

<div id="generate_invoice_block">
    <div class="form-group col-md-2">
        <label class="control-label">
            Invoice Date:
        </label>
        <input name="invoice_date" type="text" value="{{\App\Charity::nextCycle()->subDays(3)}}" class="form-control datepicker"/>
    </div>
    <button id="generate_invoice_btn" class="btn btn-default" type="submit">Generate invoice</button>
</div>

<input name="type" type="hidden" value="Payment to charity"/>
<input name="charity_id" type="hidden" value="{{$charity->id}}"/>
<input name="beneficiary_type" type="hidden" value="charity"/>
<input name="purchase_ids" type="hidden" value=""/>
<div class='clearfix'></div>
{{ Form::close() }}

@section('js')
    @parent
    <script type="text/javascript">

        // Initially Hide button
        $('#generate_invoice_block').hide();

        // On each check box check/uncheck construct purchase_ids_csv based on selection
        // If the is selected id then only show the generate button.
        $('#generate_invoice').find('.purchase_id_checkbox').change(function () {

            var purchase_ids_csv = $('.purchase_id_checkbox:checked').map(function () {
                return this.value;
            }).get().join(',');

            // alert(purchase_ids_csv.length);

            // Populate a hidden input feild with  purchase_ids_csv
            $('#generate_invoice').find('input[name=purchase_ids]').val(purchase_ids_csv);

            if (purchase_ids_csv.length) {
                $('#generate_invoice_block').show();
            } else {
                $('#generate_invoice_block').hide();
            }
        });

    </script>

@endsection