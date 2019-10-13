<?php
$invoices = \App\Invoice::where('is_active', 1)->remember(cacheTime('long'))->orderBy('created_at', 'DESC')->get();
?>

<div class="row">
    <div class="col-md-12">
        <b>Listing of current invoices</b>
        <table class="table datatable-min">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Beneficiary</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Due date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td scope="row"><a href="{{route('invoices.edit',$invoice->id)}}">{{$invoice->id}}</a></td>
                    <td>{{$invoice->beneficiary_name}}</td>
                    <td>{{$invoice->beneficiary_type}}</td>
                    <td>{{$invoice->status}}</td>
                    <td>{{$invoice->due_date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>