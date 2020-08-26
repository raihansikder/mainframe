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

use App\Projects\MphMarket\Modules\Clients\Client;
$clients = Client::where('reseller_id', $element->id)->where('is_active', 1)->get();
?>

<div class="clearfix"></div>

<h4 class="pull-left">Clients</h4>
<table id="tableClients" class="table datatable-min">
    <thead>
    <tr id="header">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Partner Account Manager</th>
        <th>Updater</th>
        <th>Updated at</th>
        <th>Active</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <?php
        /** @var \App\Projects\MphMarket\Modules\Invoices\Invoice $client */
        $link = route('clients.edit', $client->id);
        ?>
        <tr>
            <td><a href="{{$link}}">{{$client->id}}</a></td>
            <td><a href="{{$link}}">{{$client->name}}</a></td>
            <td>{{$client->email}}</td>
            <td>{{$client->phone}}</td>
            <td>@if($client->partner_account_manager_name){{$client->partner_account_manager_name}}@endif</td>
            <td>@if($client->updater){{$client->updater->name}}@endif</td>
            <td>{{$client->updated_at}}</td>
            <td>@if($client->is_active){{"Yes"}}@else {{"No"}}@endif</td>

        </tr>
    @endforeach
    </tbody>
</table>
