<?php
/**
 * For documentation and global variables on how form.blade views please refer to
 * parent template \app\views\spyr\modules\groups\form.blade.php
 *
 * Variables used in this view file.
 * @var $module_name             string 'transactions'
 * @var $mod                     \App\Module
 * @var $transaction             \App\Transaction Object that is being edited
 * @var $element                 string 'transaction'
 * @var $element_editable        boolean
 * @var $uuid                    string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

{{-- Form starts: Form fields are placed here. These will be added inside the spyrframe default form container in
 app/views/spyr/modules/base/form.blade.php --}}
@include('form.input-text',['var'=>['name'=>'name','label'=>'Title', 'container_class'=>'col-sm-4']])
@include('form.input-text',['var'=>['name'=>'invoice_id','label'=>'Invoice Id', 'container_class'=>'col-sm-2']])
@include('form.select-array',['var'=>['name'=>'is_test','label'=>'Is test', 'options'=>['0'=>'No','1'=>'Yes',],'container_class'=>'col-sm-3']])

@if(isset($transaction))
    <?php
    /** @var \App\Transaction $transaction */
    /** @var \App\Invoice $invoice */
    $invoice = $transaction->invoice;
    $beneficiary = $invoice->beneficiary();
    $beneficiary_type = $invoice->beneficiaryType();

    ?>
    <div class="clearfix"></div>
    <div class="col-md-6 no-padding">
        <table id="address_table" class="table table-bordered table-striped">

            <tbody>
            <tr>
                <td><b>UUID</b></td>
                <td>
                    <pre>{{ $transaction->uuid }}</pre>
                </td>
            </tr>
            <tr>
                <td><b>Recipient</b></td>
                <td>{{ $beneficiary->name }} ({{ ucfirst($beneficiary_type) }}) ID #{{ $beneficiary->id }}</td>
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
            <tr>
                <td><b>Amount</b></td>
                <td>{{ $transaction->amount_currency}} {{ $transaction->amount}}</td>
            </tr>


            @if($transaction->payment_gateway_name == 'TransferWise')
                <tr>
                    <td><b>Transferwise quote ID</b></td>
                    <td>
                        <pre>{{ $transaction->transferwise_quote_id}}</pre>
                        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($transaction->transferwise_quote)); ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Transferwise recipient <br/>account ID</b></td>
                    <td>
                        <pre>{{ $transaction->transferwise_account_id}}</pre>
                        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($transaction->transferwise_account)); ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Transferwise transfer Id</b></td>
                    <td>
                        <pre>{{ $transaction->transferwise_transfer_id}}</pre>
                        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($transaction->transferwise_transfer)); ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Transferwise transfer Status</b></td>
                    <td>
                        <pre>{{ $transaction->getTransferwiseTransferStatus() }}</pre>
                        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($transaction->getTransferwiseTransferDetails())); ?>
                    </td>
                </tr>
            @elseif($transaction->payment_gateway_name == 'Paypal')
                <tr>
                    <td><b>Paypal Payout Batch Id</b></td>
                    <td>
                        <pre>{{ $transaction->paypal_payout_batch_id }}</pre>
                    </td>
                </tr>
                <tr>
                    <td><b>Paypal Payout Batch Status</b></td>
                    <td>
                        <pre>{{ $transaction->paypal_payout_batch_status }}</pre>
                    </td>
                </tr>
                <tr>
                    <td><b>Paypal Payout Sender Batch Id</b></td>
                    <td>
                        <pre>{{ $transaction->paypal_payout_sender_batch_id }}</pre>
                    </td>
                </tr>
                <tr>
                    <td><b>Paypal Payout Email</b></td>
                    <td>
                        <pre>{{ $transaction->paypal_payout_email_subject }}</pre>
                    </td>
                </tr>
                <tr>
                    <td><b>Paypal Gateway Response</b></td>
                    <td>
                        <?php Symfony\Component\VarDumper\VarDumper::dump(json_decode($transaction->payment_gateway_response)); ?>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>

    </div>
@endif


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
            // during creation of an element. As this stage $$element or $transaction(module
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
            // during update the variable $$element or $transaction(module
            // name singular) is set, and id like other attributes of the element can be
            // accessed by calling $$element->id, also $transaction->id
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
        // enableValidation('{{$module_name}}'); // Instantiate validation function
    </script>
@endsection
{{-- JS ends --}}