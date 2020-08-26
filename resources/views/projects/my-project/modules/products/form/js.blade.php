<?php
/**
 * @var \App\Projects\MphMarket\Modules\Products\Product $module
 * @var \App\User $user
 * @var \App\User $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
?>
<script>

    /*
    |--------------------------------------------------------------------------
    | Creating + Updating
    |--------------------------------------------------------------------------
    |
    */
    /*
    * Show hide field based on is_bundle selection
    **/
    fieldsForBundleProduct()
    $('select#is_bundle').bind('change', function () {
        fieldsForBundleProduct();
    });

    /**
     * Assigns validation rules during saving (both creating and updating)
     **/
    addValidationRules();                   // Assign validation classes/rules
    $('select[id=vendor_id]').select2();

    enableValidation('{{$module->name}}', function (ret) {
        setTimeout(function () {
            if (ret.hasOwnProperty('redirect')) {
                window.location.replace(ret.redirect);
            }
        }, 3500);
    }); // Enable Ajax based form validation.

    //table sorting
    $('#tableStockUpdates').DataTable().order([0, 'desc']).draw();


    @if($element->isCreating())
    /*
    |--------------------------------------------------------------------------
    | Creating
    |--------------------------------------------------------------------------
    |
    */
    @elseif($element->isUpdating())
    /*
    |--------------------------------------------------------------------------
    | Updating
    |--------------------------------------------------------------------------
    |
    */
    @endif
    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
    }

    /**
     * Show/Hide field for bundle products
     */
    function fieldsForBundleProduct() {
        var is_bundle = $('select#is_bundle').val();

        if (is_bundle == 1) { // Is bundle
            // console.log('Inside is bundle ' + is_bundle);
            $("#parent_id").select2("val", "").select2('readonly', true);
            $("#stock_parent_id").select2("val", "").select2('readonly', true);
            $(".non-bundle-input").fadeOut();
        } else {
            // console.log('not Inside is bundle ' + is_bundle);
            $("#parent_id").select2('readonly', false);
            $("#stock_parent_id").select2('readonly', false);
            $(".non-bundle-input").fadeIn();
        }
    }
</script>