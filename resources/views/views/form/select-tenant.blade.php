@if(tenantUser())
    <input name="tenant_id" type="hidden" value="{{userTenantId()}}"/>
@else
    <?php
    $var = [
        'name' => 'tenant_id',
        'label' => 'Partner',
        'query' => DB::table('tenants')
    ];
    ?>
    @include("form.select-model",['var'=>$var])
@endif