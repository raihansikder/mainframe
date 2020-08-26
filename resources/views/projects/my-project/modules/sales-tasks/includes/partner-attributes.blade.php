<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/23/2020
 * Time: 2:21 AM
 */
?>


<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#partnerAttribute">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Partner Attributes
                </a>
            </h5>
        </div>
        <div id="partnerAttribute" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-4">
                @include('form.textarea',['var'=>['name'=>'industry_sector','label'=>'Industry Sector', 'div'=>'col-sm-12']])
                {{--first_name--}}
            </div>
            <div class="col-md-4">
                @include('form.textarea',['var'=>['name'=>'service','label'=>'Products/Services/Solutions', 'div'=>'col-sm-12']])
            </div>
            <div class="clearfix">
                @include('form.select-array',['var'=>['name'=>'customer_type','label'=>'Customer Type', 'options'=>$customerTypes]])
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4">
                @include('form.text',['var'=>['name'=>'last_deal_size','label'=>'Last Deal Size', 'div'=>'col-sm-12']])
            </div>
            <div class="col-md-4">
                @include('form.text',['var'=>['name'=>'biggest_deal_size','label'=>'Biggest Deal Size', 'div'=>'col-sm-12']])
                {{--address2--}}
            </div>
            <div class="col-md-4">
                @include('form.text',['var'=>['name'=>'most_purchased_product','label'=>'Most Purchased Product', 'div'=>'col-sm-12']])
            </div>
            <div class="clearfix">
                <div class="col-md-4">
                    @include('form.text',['var'=>['name'=>'purchase_frequency','label'=>'Purchase Frequency', 'div'=>'col-sm-12']])
                </div>

                <div class="col-md-4">
                    @include('form.text',['var'=>['name'=>'average_time_order_conversion','label'=>'Average Time Order Conversion', 'div'=>'col-sm-12']])
                </div>

                <div class="col-md-4">
                    @include('form.text',['var'=>['name'=>'conversion_ratio','label'=>'Conversion Ratio','div'=>'col-sm-12']])
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    @include('form.text',['var'=>['name'=>'account_manager','label'=>'Account Manager','div'=>'col-sm-12']])
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <h3>Customer Personal</h3>
                </div>
                <div class="col-md-4">
                    <h3>Training Completed To Date</h3>
                </div>

                <div class="clearfix"></div>
                <div class="col-md-4">
                    @include('form.datetime',['var'=>['name'=>'dob_reseller','label'=>'Date of Birth', 'div'=>'col-sm-12']])
                </div>
                <div class="col-md-4">
                    @include('form.textarea',['var'=>['name'=>'webinars_attended','label'=>'Webinars Attended', 'div'=>'col-sm-12']])
                </div>
                <div class="col-md-4">
                    @include('form.textarea',['var'=>['name'=>'competencies','label'=>'Competencies', 'div'=>'col-sm-12']])
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    @include('form.checkbox',['var'=>['name'=>'onboarding_completed','label'=>'OnBoarding Completed','div'=>'col-sm-12']])
                </div>
                <div class="col-md-4">
                    @include('form.textarea',['var'=>['name'=>'accreditations','label'=>'Accreditations', 'div'=>'col-sm-12']])
                </div>

            </div>
        </div>
    </div>
</div>