@extends('projects.my-project.layouts.module.form.template')
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\ShippingLabels\ShippingLabel $element
 */
use App\Projects\MphMarket\Helpers\Fedex\Fedex;

$currencies = ['GBP', 'USD', 'EUR'];

if ($element->tracking_number) {
    $immutables = $element->fields(['description', 'note']);
}

$packageTypes = Fedex::$packagingTypes;

?>

@section('content-top')
    @parent
    @include('projects.my-project.modules.shipping-labels.form.includes.content-top')
@endsection

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{-- ******** Form inputs: starts *********** --}}
        {{-- **************************************** --}}

        {{-- order_id --}}
        @include('form.text',['var'=>['name'=>'order_id','label'=>'Order id', 'editable'=> $element->order_id ? false : true ]])
        {{-- tracking_number no --}}
        @include('form.text',['var'=>['name'=>'tracking_number','label'=>'Master Tracking No.']])

        @if($element->tracking_number)
            <a class="btn btn-default bg-blue-gradient"
               target="_blank"
               style="margin-top: 20px"
               href="{{$element->fedexTrackingUrl()}}">
                TRACK
            </a>
        @endif

        <div class="clearfix"></div>
        @include('form.date',['var'=>['name'=>'ship_on','label'=>'Ship date']])
        @include('form.text',['var'=>['name'=>'po_no','label'=>'PO No. (For Label)']])
        @include('form.text',['var'=>['name'=>'invoice_no','label'=>'Invoice No. (For Label)']])
        <div class="clearfix"></div>

        @include('projects.my-project.modules.shipping-labels.form.includes.address')
        @include('projects.my-project.modules.shipping-labels.form.includes.packages')
        @include('projects.my-project.modules.shipping-labels.form.includes.rate-selector')
        @include('projects.my-project.modules.shipping-labels.form.includes.commodities')
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <h3>Notes <small>For internal use</small></h3>
        @include('form.textarea',['var'=>['name'=>'description','label'=>'Details']])
        @include('form.textarea',['var'=>['name'=>'note','label'=>'Admin note']])

        <div class="clearfix"></div>
        {{-- @include('form.checkbox',['var'=>['name'=>'is_test','label'=>'Test?']])--}}

        {{--  ******** Form inputs: ends ************ --}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')

    <?php
    $documents = [];
    if ($element->documents) {
        $documents = json_decode(json_encode($element->documents), FALSE);
    }
    ?>
    @foreach($documents as $document)
        @foreach($document->files as $file)
            {{--    <img src="data:image/png;base64,{{$temp[0]->file[0]->data}}" alt=""/>--}}
            <div class="col-md-3" style="height: 200px; overflow: hidden">
                <h4> Package {{$document->package_no}}-{{\Illuminate\Support\Str::title(str_replace('_',' ',$file->type))}}</h4>
                @if(in_array($file->ext,['png']))

                    <a href="{{asset(Storage::url($file->location))}}">
                        <img src="{{asset(Storage::url($file->location))}}" alt="" style="width: 100%;"/>
                    </a>
                @else
                    <a href="{{asset(Storage::url($file->location))}}">
                        <img src="{{asset('mainframe/images/file_type_icons/'.$file->ext.'.png')}}" alt="" style="height: 100px"/>
                        Download
                    </a>
                @endif
            </div>
        @endforeach
    @endforeach

    @include('projects.my-project.modules.shipping-labels.form.includes.generated-labels')


    @if($element->response && $user->isSuperUser())
        <div class="clearfix"></div>
        <h3>FedEx API Response</h3>
        @dump($element->response)

        <div class="clearfix"></div>
        <h3>Rates from Fedex</h3>
        @dump($element->extractCosts())
        <div class="clearfix"></div>
    @endif
    <div class="clearfix"></div>


@endsection

@section('js')
    @parent
    @include('projects.my-project.modules.shipping-labels.form.js')
@endsection