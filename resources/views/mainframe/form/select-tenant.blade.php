@if(tenantUser())
    <input name="tenantId" type="hidden" value="{{userTenantId()}}"/>
@else
    <?php
    $var = [
        'name' => 'tenantId',
        'label' => 'Partner',
        'query' => DB::table('tenants')
    ];
    ?>
    @include("form.select-model",['var'=>$var])
@endif