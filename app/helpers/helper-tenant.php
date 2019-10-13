<?php
/**
 * Ideally in every multi-tenant system a single common field stores the tenant id of any element/row.
 * Having this field uniformly in all tables/modules gives an added advantage to architecture.
 * This field name is stored in a configuration file commonly accessible.
 *
 * @return mixed|null
 */
function tenantIdField()
{
    return conf('var.tenant_field_identifier');
}

/**
 * Returns the currently logged in user's tenant id(if the user belongs to a specific tenant)
 *
 * @param null $user_id
 * @return bool|mixed
 */
function userTenantId($user_id = null)
{
    $tenant_idf = tenantIdField();
    $user = user($user_id);

    if ($user && $user->$tenant_idf) {
        return $user->$tenant_idf;
    }
    return false;
}

/**
 * Alias of the function userTenantId
 *
 * @param null $user_id
 * @return bool|mixed
 */
function tenantUser($user_id = null)
{
    return userTenantId($user_id);
}

/**
 * Returns the tenant id of the element.
 *
 * @param $element
 * @return bool
 */
function elementTenantId($element)
{
    $tenant_idf = tenantIdField();
    if (isset($element->$tenant_idf) && $element->$tenant_idf) {
        return $element->$tenant_idf;
    }
    return false;
}

/**
 * Checks if a module has tenant context.
 *
 * @param $module_name
 * @return bool
 */
function moduleHasTenantContext($module_name)
{
    $tenant_idf = tenantIdField();
    return tableHasColumn($module_name, $tenant_idf);
}

/**
 * Check if a logged in user is currently in a tenant context, If the user belongs to a tenant
 * and the module has tenant context then it returns the user id.
 *
 * @param      $module_name
 * @param null $user_id
 * @return bool|mixed|null
 */
function inTenantContext($module_name, $user_id = null)
{
    if (userTenantId($user_id) && moduleHasTenantContext($module_name)) {
        return userTenantId();
    }
    return null;
}

/**
 * Checks if a specific element belongs to a the same tenant of the current user.
 *
 * @param      $element
 * @param null $user_id
 * @return bool
 */
function elementBelongsToSameTenant($element, $user_id = null)
{
    $tenant_idf = tenantIdField();
    if (inTenantContext(moduleName(get_class($element))) && (userTenantId($user_id) == $element->$tenant_idf)) {
        return true;
    }
    return false;
}

/**
 * During Model saving() we can inject facilityagency_id based on the logged in user's tenant_id
 *
 * @param Eloquent $model
 * @param null $user_id
 * @return \Eloquent
 */
function fillTenantId(Eloquent $model, $user_id = null)
{
    $tenant_idf = tenantIdField();
    if (inTenantContext(moduleName(get_class($model)))) {
        $model->$tenant_idf = userTenantId($user_id);
    }
    return $model;
}

/**
 * Checks if input has tenant_id value
 *
 * @return bool|mixed
 */
function tenantInput()
{
    if (Request::has(tenantIdField())) {
        return Request::get(tenantIdField());
    }
    return false;
}

/**
 * @param      $module_name
 * @param \Illuminate\Database\Query\Builder $q
 * @param null $user_id
 * @return mixed
 */
function injectTenantIdInModelQuery($module_name, $q, $user_id = null)
{
    if ($tenant_id = inTenantContext($module_name, $user_id)) {
        $q = $q->where($module_name . '.' . tenantIdField(), $tenant_id);
    }
    return $q;
}

/**
 * Injects tenant id match in SQL query
 *
 * @param      $module_name
 * @param      $sql
 * @param null $user_id
 * @return string
 */
function injectTenantIdInSqlQuery($module_name, $sql, $user_id = null)
{
    if ($tenant_id = inTenantContext($module_name, $user_id)) {
        $sql = $sql . " AND " . dbTable($module_name) . "." . tenantIdField() . "= $tenant_id";
    }
    return $sql;
}
