<?php
/** @var \App\User $element */
$element->country_id = $element->country_id ?: 187;
?>

{{--Contact--}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#contact">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Contact
                </a>
            </h5>
        </div>
        <div id="contact" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                {{--full_name--}}
                {{--@include('form.plain-text',['var'=>['name'=>'full_name','label'=>'Full name', 'div'=>'col-sm-6']])                               --}}


                {{--address1--}}
                @include('form.text',['var'=>['name'=>'address1','label'=>'Address-1', 'div'=>'col-sm-6']])
                {{--address2--}}
                @include('form.text',['var'=>['name'=>'address2','label'=>'Address-2', 'div'=>'col-sm-6']])
                {{--city--}}
                @include('form.text',['var'=>['name'=>'city','label'=>'City', 'div'=>'col-sm-3']])
                {{--county--}}
                @include('form.text',['var'=>['name'=>'county','label'=>'County', 'div'=>'col-sm-3']])
                {{--country_id--}}
                @include('form.select-model',['var'=>['name'=>'country_id','label'=>'Country','table'=>'countries', 'div'=>'col-sm-3']])
                {{--zip_code--}}
                @include('form.text',['var'=>['name'=>'zip_code','label'=>'Postcode / ZIP Code', 'div'=>'col-sm-3']])
                {{--phone--}}
                @include('form.text',['var'=>['name'=>'phone','label'=>'Phone', 'div'=>'col-sm-3']])
                {{--mobile--}}
                @include('form.text',['var'=>['name'=>'mobile','label'=>'Mobile', 'div'=>'col-sm-3']])

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
{{-- Activity summary --}}
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#activity">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Activity summary
                </a>
            </h5>
        </div>
        <div id="activity" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                {{--first_login_at--}}
                @include('form.datetime',['var'=>['name'=>'first_login_at','label'=>'First login at', 'div'=>'col-sm-3']])
                {{--last_login_at--}}
                @include('form.datetime',['var'=>['name'=>'last_login_at','label'=>'Last login at', 'div'=>'col-sm-3']])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>