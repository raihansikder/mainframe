<script type="text/javascript">
    /*******************************************************************/
    // List of functions
    /*******************************************************************/

    // Assigns validation rules during saving (both creating and updating)
    function addValidationRulesForSaving() {
        $("input[name=name]").addClass('validate[required]');
    }
</script>

@if($element->isCreating())
    <script type="text/javascript">
        // Execute these codes when a module is being created.
    </script>
@elseif($element->isUpdating())
    <script type="text/javascript">
        // Execute these codes when the form is opened for update.
    </script>
@endif

<script type="text/javascript">
    /*******************************************************************/
    // Saving (Common )
    /*******************************************************************/
    /*******************************************************************/
    // frontend and Ajax hybrid validation
    /*******************************************************************/
    // addValidationRulesForSaving(); // Assign validation classes/rules
    //enableValidation('{{$module->name}}');
</script>