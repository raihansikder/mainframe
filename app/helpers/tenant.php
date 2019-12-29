<?php
/**
 * Ideally in every multi-tenant system a single common field stores the tenant id of any element/row.
 * Having this field uniformly in all tables/modules gives an added advantage to architecture.
 * This field name is stored in a configuration file commonly accessible.
 *
 * @return mixed|null
 */


/**
 * Returns the currently logged in user's tenant id(if the user belongs to a specific tenant)
 *
 * @param null $user_id
 * @return bool|mixed
 */
function userTenantId($user_id = null)
{
    $tenant_idf = 'tenant_id';
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
 * Checks if a module has tenant context.
 *
 * @param $moduleName
 * @return bool
 */
function moduleHasTenantContext($moduleName)
{
    $tenant_idf = 'tenant_id';
    return tableHasColumn($moduleName, $tenant_idf);
}

/**
 * Check if a logged in user is currently in a tenant context, If the user belongs to a tenant
 * and the module has tenant context then it returns the user id.
 *
 * @param      $moduleName
 * @param null $user_id
 * @return bool|mixed|null
 */
function inTenantContext($moduleName, $user_id = null)
{
    if (userTenantId($user_id) && moduleHasTenantContext($moduleName)) {
        return userTenantId();
    }
    return null;
}


/**
 * @param      $moduleName
 * @param \Illuminate\Database\Query\Builder $q
 * @param null $user_id
 * @return mixed
 */
function injectTenantIdInModelQuery($moduleName, $q, $user_id = null)
{
    if ($tenant_id = inTenantContext($moduleName, $user_id)) {
        $q = $q->where($moduleName . '.' . 'tenant_id', $tenant_id);
    }
    return $q;
}
