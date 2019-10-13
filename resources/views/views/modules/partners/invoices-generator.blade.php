<?php
/**
 * @var $partner \App\Partner
 */
?>
<b>Following is a list of donations from recent purchases that are yet to be invoiced/transferred.</b><br/>
Invoices will be automatically generated on due time and transfer will be processed. To manually create
invoice select entries from the list and click on 'Create Invoice

{{ Form::open(['id'=>'generate_invoice','route' => 'invoices.store-partner']) }}
<table id="tbl_purchases_not_invoiced" class="table module-grid table table-bordered table-striped"
       width="100%">
    <thead>
    <tr>
        <th></th>
        <th>Purchase</th>
        <th>Date</th>
        <th>Brand</th>
        <th>Product</th>
        <th>Amount</th>
        <th>Approved</th>
        <th>Env</th>
    </tr>
    </thead>
    <tbody>
    @foreach($purchases_not_invoiced as $purchase)
        <?php

        /** Determine normal or split earning  */
        /** @var \App\Purchase $purchase */
        $earning = $purchase->invoicableAmountToPartner($partner);
        $earning_currency = $purchase->partner_currency;

        $approved_css = $purchase->is_approved === 1 ? 'bg-green disabled color-palette' : '';
        $env_css = $purchase->partner_env === 'Live' ? 'bg-green disabled color-palette' : '';
        $commission_css = $earning > 0 ? 'bg-green disabled color-palette' : '';


        ?>

        <tr>
            <td>
                @if($purchase->lb_commission_in_lb_currency >0 && $purchase->isInvoicable())
                    <input name="purchase_id[]" type="checkbox" class="purchase_id_checkbox" value="{{$purchase->id}}"/>
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
            <td class="{{$commission_css}}">
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
        <input name="invoice_date" type="text" value="{{\App\Partner::lastCycle()}}" class="form-control datepicker"/>
    </div>
    <button id="generate_invoice_btn" class="btn btn-default" type="submit">Generate invoice</button>
</div>

<input name="partner_id" type="hidden" value="{{$partner->id}}"/>
<input name="type" type="hidden" value="Payment to Letsbab (LB and Recommender commission)"/>
<input name="beneficiary_type" type="hidden" value="partner"/>
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