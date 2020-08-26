<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Vendors\Vendor $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\Invoices\Invoice;
$invoices = Invoice::where('reseller_id', $element->id)->where('is_active', 1)->get();
?>

<div class="clearfix"></div>

<h4 class="pull-left">Invoices</h4>
<div class="clearfix"></div>
<table id="tableInvoices" class="table datatable">
    <thead>
    <tr id="header">
        <th>ID</th>
        <th>Name</th>
        <th>Partner</th>
        <th>Status</th>
        <th>Updater</th>
        <th>Due On</th>
        <th>Updated at</th>
        <th>PO Reference</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <?php
        /** @var \App\Projects\MphMarket\Modules\Invoices\Invoice $invoice */
        $link = route('invoices.edit', $invoice->id);
        ?>
        <tr>
            <td><a href="{{$link}}">{{$invoice->id}}</a></td>
            <td><a href="{{$link}}">{{$invoice->name}}</a></td>
            <td>@if($invoice->reseller){{$invoice->reseller->name}}@endif</td>
            <td>{{$invoice->status}}</td>
            <td>{{$invoice->updater->name}}</td>
            <td>{{$invoice->due_on}}</td>
            <td>{{$invoice->updated_at}}</td>
            <td>{{$invoice->po_reference}}</td>
            <td>{{$invoice->grand_total}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
