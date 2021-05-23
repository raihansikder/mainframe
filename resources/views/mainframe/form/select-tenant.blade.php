@if(user()->ofTenant())
    <input name="tenant_id" type="hidden" value="{{user()->tenant_id}}"/>
@else
    <?php
    $var = [
        'name' => 'tenant_id',
        'label' => 'Tenant',
        'query' => DB::table('tenants')
    ];
    ?>
    @include("form.select-model",['var'=>$var])
@endif