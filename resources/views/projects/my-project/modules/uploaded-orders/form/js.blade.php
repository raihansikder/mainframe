<?php
/**
 * @var \App\Mainframe\Modules\Superheroes\UploadedOrder $module
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
    | Common JS to run for both create and update
    |--------------------------------------------------------------------------
    |
    | Write the functions on this top section of the file so that they
    | can be called by the codes after it.
    */
    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    addValidationRules(); // Assign validation classes/rules
    changeClientBasedOnReseller();
    // enableValidation('{{$module->name}}'); // Enable Ajax based form validation.

    @if($element->isCreating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during creation
    |--------------------------------------------------------------------------
    |
    |
    | Some JS may only be required to be executed while creating a
    | model. Write such JS here
    */
    @elseif($element->isUpdating())
    /*
    |--------------------------------------------------------------------------
    | JS to run only during update
    |--------------------------------------------------------------------------
    |
    | Some JS may only be required to be executed while updating an
    | existing model. Write such JS here
    */
    @endif
    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    |
    | Write the functions on this top section of the file so that they
    | can be called by the codes after it.
    */
    /**
     * Assigns validation rules during saving (both creating and updating)
     */
    function addValidationRules() {
        $("input[name=name]").addClass('validate[required]');
    }
    /**
     *
     */
    function changeClientBasedOnReseller() {
        $('select[name=reseller_id]').change(function () { // change function of listbox
            var reseller_id = $('select[name=reseller_id]').select2('val');
            //clearing the data , empty the options , enable it with current options
            $("select[name=client_id]").select2("val", "").empty().attr('disabled', false);// Remove the existing options
            $.ajax({
                type: "get",
                datatype: 'json',
                url: '{{route('clients.list-json')}}',
                data: {
                    reseller_id: reseller_id,
                },
                success: function (response) {
                    //console.log(response.data.items);
                    $("select[name=client_id]").append("<option value=0>" + " " + "</option>");
                    $.each(response.data.items, function (i, obj) {
                        $("select[name=client_id]").append("<option value=" + obj.id + ">" + obj.name + "</option>");
                    });
                },
            });

        });
    }
</script>