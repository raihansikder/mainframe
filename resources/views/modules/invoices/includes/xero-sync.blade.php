<h4>Xero Sync </h4>
@isset($invoice->xero_invoice_id)
    Already Pushed to Xero : Invoice ID <code>{{$invoice->xero_invoice_id}}</code>
@endif
@if($invoice->pushableToXero())
    {{ Form::open(['url' => route('post.invoices.push-to-xero',$invoice->id),'name'=>'transactions']) }}
    <button class="btn btn-default bg-black">Push to Xero  &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
    {{ Form::close() }}
@else
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        This invoice can not be pushed to Xero because the invoice status is not set as 'Paid'.
        Only for a partner invoices it is possible to push a 'Due' invoice to Xero
    </div>
@endif