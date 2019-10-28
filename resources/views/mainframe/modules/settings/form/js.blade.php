<script>

    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    |
    | Register the observer in the boot method. You can also make use of
    | model events like saving, creating, updating etc to further
    | manipulate the model
    */

    // Assigns validation rules during saving (both creating and updating)
    function addValidationRulesForSaving() {
        $("input[name=name]").addClass('validate[required]');
    }
</script>

@if($element->isCreating())
    <script>
        // Execute these codes when a module is being created.
    </script>
@elseif($element->isUpdating())
    <script>
        // Execute these codes when the form is opened for update.
    </script>
@endif

<script>
    /*******************************************************************/
    // Saving (Common )
    /*******************************************************************/
    /*******************************************************************/
    // frontend and Ajax hybrid validation
    /*******************************************************************/
    // addValidationRulesForSaving(); // Assign validation classes/rules
    // enableValidation('{{$module->name}}');
</script>