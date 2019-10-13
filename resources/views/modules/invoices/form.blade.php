<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name           string 'invoices'
 * @var $mod                   \App\Module
 * @var $invoice               \App\Invoice Object that is being edited
 * @var $element               string 'invoice'
 * @var $element_editable      boolean
 * @var $uuid                  string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */

use Symfony\Component\VarDumper\VarDumper;

if (isset($invoice)) {
    $beneficiary_type = $invoice->beneficiaryType();
    $beneficiary = $invoice->beneficiary();
}
?>

{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}

@if(isset($invoice))
    {{-- <b>#{{$invoice->code}} {{ucfirst($invoice->beneficiary_type)}} Invoice #{{pad($invoice->id)}} - ({{$invoice->type}})</b>--}}
    <div class='clearfix'></div>
    @include('form.input-text',['var'=>['name'=>'code','label'=>'Invoice Number']])
    <div class='clearfix'></div>
    @include('form.input-text',['var'=>['name'=>'name','label'=>'Invoice title', 'container_class'=>'col-sm-6']])
    <div class="clearfix"></div>
    @include('form.input-text',['var'=>['name'=>'description','label'=>'Description/Xero Line Desctiption', 'container_class'=>'col-sm-6', 'editable'=>false]])
    <div class="clearfix"></div>

    <div class="col-md-6 no-padding">
        <h4>Recipient details</h4>
        <table id="address_table" class="table table-bordered table-striped">
            <tbody>
            <tr>
                <td><b>To</b></td>
                <td>{{ $beneficiary->name }}</td>
            </tr>
            <tr>
                <td><b>Type</b></td>
                <td>{{$invoice->beneficiary_type }}</td>
            </tr>
            <tr>
                <td><b>Address</b></td>
                <td>{{ $invoice->address()}}</td>
            </tr>
            <tr>
                <td><b>Phone</b></td>
                <td>{{ $invoice->phone}}</td>
            </tr>
            <tr>
                <td><b>Address</b></td>
                <td>{{ $invoice->mobile}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h4>Payment amounts</h4>
        <table id="address_table" class="table">
            <tbody>
            <tr>
                <td><b>Total</b></td>
                <td>{{ symbol($invoice->currency).money($invoice->total_amount) }}</td>
            </tr>
            <tr>
                <td><b>VAT</b></td>
                <td><span class="pull-left" style="padding-top: 6px"> {{ symbol($invoice->currency)}}</span> &nbsp;
                    @include('form.input-text',['var'=>['name'=>'vat_amount', 'container_class'=>'col-sm-3 no-padding no-margin']])
                </td>
            </tr>
            <tr>
                <td><b>Adjustment amount(+/-)</b></td>
                <td>
                    <span class="pull-left" style="padding-top: 6px">{{ symbol($invoice->currency)}}</span>
                    @include('form.input-text',['var'=>['name'=>'adjustment_amount', 'container_class'=>'col-sm-3 no-padding no-margin']])
                </td>
            </tr>
            <tr>
                <td><b>Sub total</b></td>
                <td>{{ symbol($invoice->currency).money($invoice->subtotal)}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="clearfix"></div>
    @include('form.textarea',['var'=>['name'=>'adjustment_note', 'label'=>'Reason of adjustment', 'container_class'=>'col-sm-6']])
    @include('form.textarea',['var'=>['name'=>'details', 'label'=>'Other details', 'container_class'=>'col-sm-6']])


@endif
@include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])
@include('form.select-array',['var'=>['name'=>'status','label'=>'Status', 'options'=>kv(array_merge([""=>'-'],\App\Invoice::$statuses)), 'container_class'=>'col-sm-3']])

<div class="clearfix"></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#dates">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dates
                </a>
            </h5>
        </div>
        <div id="dates" class="panel-collapse collapse" style="margin:15px 0;" aria-expanded="true">
            <div class="col-md-12">
                {{--date fields--}}
                @include('form.input-text',['var'=>['name'=>'invoice_date', 'label'=>'Invoice date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'due_date', 'label'=>'Due date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker']]])
                @include('form.input-text',['var'=>['name'=>'processing_date', 'label'=>'Processing date', 'container_class'=>'col-sm-2', 'editable'=>false, 'params'=>['class'=>'datepicker'] ]])
                @include('form.input-text',['var'=>['name'=>'payment_date', 'label'=>'Payment date', 'container_class'=>'col-sm-2','params'=>['class'=>'datepicker'] ]])
                @include('form.input-text',['var'=>['name'=>'natwest_payment_to_arrive_credit_date', 'label'=>'Natwest payment to arrive credit date', 'container_class'=>'col-sm-4','params'=>['class'=>'datepicker'] ]])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="clearfix"></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#xero-fields">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Xero data fields
                </a>
            </h5>
        </div>
        <div id="xero-fields" class="panel-collapse collapse" style="margin:15px 0;" aria-expanded="true">
            <div class="col-md-12">
                Following entries will be pushed to Xero accounting system.

                <div class='clearfix'></div>
                @include('form.input-text',['var'=>['name'=>'xero_invoice_no','label'=>'Xero Invoice No']])
                @include('form.input-text',['var'=>['name'=>'xero_invoice_type','label'=>'Xero Invoice Type']])
                @include('form.input-text',['var'=>['name'=>'xero_account_code','label'=>'Xero Acc Code']])

                <div class='clearfix'></div>
                @include('form.input-text',['var'=>['name'=>'xero_account_number','label'=>'Xero Acc No']])
                @include('form.input-text',['var'=>['name'=>'xero_branding_theme_id','label'=>'Xero Branding Theme Id']])
                @include('form.input-text',['var'=>['name'=>'xero_contact_id','label'=>'Xero Contact Id']])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#transaction">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Payment method
                </a>
            </h5>
        </div>
        <div id="transaction" class="panel-collapse collapse" style="margin:15px 0;" aria-expanded="true">
            <div class="col-md-12">
                <?php
                $transaction_editable = true;
                if (isset($invoice) && $invoice->transaction()->exists()) {
                    $transaction_editable = false;
                }
                ?>
                @include('form.select-array',['var'=>['name'=>'transfer_method','label'=>'Transfer method', 'options'=>kv(array_merge([""=>'-'],\App\Invoice::$transfer_methods)), 'container_class'=>'col-sm-3', 'editable'=>$transaction_editable]])
                @include('form.input-text',['var'=>['name'=>'transaction_id', 'label'=>'Transaction Id', 'container_class'=>'col-sm-3','editable'=>$transaction_editable]])
                @include('form.input-text',['var'=>['name'=>'transaction_status', 'label'=>'Transaction Status', 'container_class'=>'col-sm-3','editable'=>$transaction_editable]])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


{{-- Content bottom section : start--}}
@section('content-bottom')
    {{-- Show Transaction Trigger button if invoice is already created --}}
    @if(isset($invoice))

        @if(user()->isSuperUser())

            <div class="col-md-6">
                @include('modules.invoices.includes.purchase-list')
            </div>

            <div class="col-md-6">
                @include('modules.invoices.includes.transaction')
                <hr/>
                @include('modules.invoices.includes.xero-sync')
            </div>
        @endif
    @endif
@endsection
{{-- Content bottom section : end--}}

{{--@include('form.is_active')--}}
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
            $("input[name=name]").addClass('validate[required]');
        }
    </script>
    @if(!isset($$element))
        <script type="text/javascript">
            /*******************************************************************/
            // Creating :
            // this is a place holder to write  the javascript codes
            // during creation of an element. As this stage $$element or $invoice(module
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
            // during update the variable $$element or $invoice(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $invoice->id
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