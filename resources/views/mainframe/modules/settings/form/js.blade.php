<script type="text/javascript">
    /*******************************************************************/
    // List of functions
    /*******************************************************************/

    // Assigns validation rules during saving (both creating and updating)
    function addValidationRulesForSaving() {
        $("input[name=name]").addClass('validate[required]');
    }
</script>

@if(!isset($setting))
    <script type="text/javascript">
        /*******************************************************************/
        // Creating :
        // this is a place holder to write  the javascript codes
        // during creation of an element. As this stage $setting or $superhero(module
        // name singular) is not set, also there is no id is created
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();

    </script>
@else
    <script type="text/javascript">
        /*******************************************************************/
        // Updating :
        // this is a place holder to write  the javascript codes that will run
        // while updating an element that has been already created.
        // during update the variable $setting or $superhero(module
        // name singular) is set, and id like other attributes of the element can be
        // accessed by calling $setting->id, also $superhero->id
        // Following the convention of spyrframe you are only allowed to call functions
        /*******************************************************************/

        // your functions go here
        // function1();
        // function2();
    </script>
@endif
<script type="text/javascript">
    /*******************************************************************/
    // Saving :
    // Saving covers both creating and updating (Similar to Eloquent model event)
    // However, it is not guaranteed $setting is set. So the code here should
    // be functional for both case where an element is being created or already
    // created. This is a good place for writing validation
    // Following the convention of spyrframe you are only allowed to call functions
    /*******************************************************************/

    // your functions goe here
    // function1();
    // function2();

    /*******************************************************************/
    // frontend and Ajax hybrid validation
    /*******************************************************************/
    addValidationRulesForSaving(); // Assign validation classes/rules
    enableValidation('{{$moduleName}}'); // Instantiate validation function
</script>