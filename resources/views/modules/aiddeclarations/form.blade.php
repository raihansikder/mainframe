<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name                string 'aiddeclarations'
 * @var $mod                        \App\Module
 * @var $aiddeclaration             \App\Aiddeclaration Object that is being edited
 * @var $element                    string 'aiddeclaration'
 * @var $element_editable           boolean
 * @var $uuid                       string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>


{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}

Your address is needed to identify you as a current UK taxpayer.
Boost your donation by 25p of Gift Aid for every &pound;1 you donate Gift Aid is reclaimed by the charity from the tax you pay for the current tax year.

{{-- user_id --}}
<?php
$var = [
    'name' => 'user_id',
    'label' => 'User',
    'container_class' => 'col-sm-6',
    'table' => 'users',
    'name_field' => 'email',
];
?>
@include('form.select-ajax',['var'=>$var])
<div class="clearfix"></div>

@include('form.input-text',['var'=>['name'=>'first_name','label'=>'First name', 'container_class'=>'col-sm-6']])
@include('form.input-text',['var'=>['name'=>'last_name','label'=>'Surname', 'container_class'=>'col-sm-6']])
@include('form.input-text',['var'=>['name'=>'address1','label'=>'Home address', 'container_class'=>'col-sm-6']])
@include('form.input-text',['var'=>['name'=>'address2','label'=>'Home address line 2', 'container_class'=>'col-sm-6']])
@include('form.input-text',['var'=>['name'=>'zip_code','label'=>'Postcode', 'container_class'=>'col-sm-3']])
{{--country_id--}}
@include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country','table'=>'countries', 'container_class'=>'col-sm-3']])
@include('form.input-text',['var'=>['name'=>'email','label'=>'Email', 'container_class'=>'col-sm-3']])


<div class="clearfix"></div>
<h5>In order to Gift Aid your donation you must tick the box below:</h5>

<div class="clearfix"></div>
@if(isset($$element))
    <label>Declaration date</label>:     <span class="readonly">{{$$element->created_at}} &nbsp;</span>
@endif

<div class="clearfix"></div>
<?php
$tmp = [
    'name' => 'is_acknowledged',
    'label' => 'I am a UK taxpayer.Please treat all donations I may make or have made to each of the UK charity partners on the LetsBab app (click here for the list of charities.),including but not limited to Women for Women international,Legacy of War Foundation and End Youth Homelessness and any additional charities or which I may donate to which subsequently become UK charity partners on the LetsBab app, as Gift Aid donations until further notice.',
    'container_class' => 'col-sm-12',
    'table' => 'aiddeclarations',
];
?>
@include('form.input-checkbox',['var'=>$tmp])
Please let us know if you want to cancel this Declaration,change your home address or no longer pay sufficient tax
by emailing <a href="mailto:hello@letsbab.com">hello@letsbab.com</a>
by emailing <a href="mailto:hello@letsbab.com">hello@letsbab.com</a>

If you pay income Tax at the higher or additional rate and want to receive the additional tax relief due to you, you
must include all your Gift Aid donations on your Self-Assessment tax return or ask HM Revenue and Customs to adjust
your tax code.
{{-- Form ends --}}

{{-- JS starts: javascript codes go here.--}}
@section('js')
    @parent
    <script type="text/javascript">
        /*******************************************************************/
        // List of functions
        /*******************************************************************/

        // Assigns validation rules during saving (both creating and updating)
        function addValidationRulesForSaving() {
            $('input[name=name]').addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $aiddeclaration(module
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
            // during update the variable $$element or $aiddeclaration(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $aiddeclaration->id
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
        // However, it is not guaranteed $$element is set. So the code here should
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
        enableValidation('{{$module_name}}'); // Instantiate validation function
    </script>
@endsection
{{-- JS ends --}}