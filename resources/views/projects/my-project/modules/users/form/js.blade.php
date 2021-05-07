<script>
    /*
    |--------------------------------------------------------------------------
    | Common - creating and updating
    |--------------------------------------------------------------------------
    */

    $('select[id=groups]').select2();
    $('select[id=reseller_id],select[id=vendor_id],select[id=client_id]').select2();

    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    addValidationRules(); // Assign validation classes/rules
    enableValidation('{{$module->name}}'); // Enable Ajax based form validation.

    showFieldsBasedOnGroupsSelection();

    /*
    |--------------------------------------------------------------------------
    | creating
    |--------------------------------------------------------------------------
    */
    @if($element->isCreating())
    // Todo: write codes here.
    @endif

    /*
    |--------------------------------------------------------------------------
    | updating
    |--------------------------------------------------------------------------
    */
    @if($element->isUpdating())
    // Todo: write codes here.
    // Redirection after saving
    $('#{{$module->name}}-redirect-success').val('#'); //  # Stops redirection after save
    @endif
    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
        $("select[name=group_ids]").addClass('validate[required]');
    }

    /**
     * Show hide form fields based on selection
     */
    function showFieldsBasedOnGroupsSelection() {
        $('.opt_19,.opt_21,.opt_23').hide();
        var group_ids = getMultiSelectAsArray('select#groups');
        //showing div based on selected groups
        $.each(group_ids, function (key, value) {
            if (value == 19 || value == 20) {
                $(".opt_19").show();
                //$("select[name=vendor_id]").addClass('validate[required]');
                //$("select[name=reseller_id]").removeClass('validate[required]');
            }
            if (value == 21 || value == 22) {
                $(".opt_21").show();
                //$("select[name=vendor_id]").removeClass('validate[required]');
                //$("select[name=reseller_id]").addClass('validate[required]');
            }
            if (value == 23) {
                $(".opt_23").show();
            }
        });
        //clearing the value of vendor if not selected
        if (!group_ids.includes('19') && !group_ids.includes('20')) {
            $('select[name=vendor_id]').val(null);
        }
        //clearing the value of reseller if not selected
        if (!group_ids.includes('21') && !group_ids.includes('22')) {
            $('select[name=reseller_id]').val(null);
        }
        //clearing the value of client if not selected
        if (!group_ids.includes('23')) {
            $('select[name=client_id]').val(null);
        }
        $('select#groups').change(function () {
            showFieldsBasedOnGroupsSelection();
        });
    }
</script>