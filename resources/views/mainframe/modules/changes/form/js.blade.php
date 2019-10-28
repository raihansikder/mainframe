<script type="text/javascript">
    /*******************************************************************/
    // List of functions
    /*******************************************************************/
    /**
     * Enable front-end validation rules
     */
    function addValidationRules() {
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
    addValidationRules(); // Assign validation classes/rules
    /**
     * frontend and Ajax hybrid validation
     */
    enableValidation('{{$module->name}}');
</script>