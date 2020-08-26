<div class="clearfix"></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#delivery">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    &nbsp;Delivery
                </a>
            </h5>
        </div>
        <div id="delivery" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                @include('form.datetime',['var'=>['name'=>'delivery_date','label'=>'Delivery Date', 'div'=>'col-md-3']])
                @include('form.datetime',['var'=>['name'=>'shipping_date','label'=>'Shipping Date', 'div'=>'col-md-3']])
                <div class="clearfix"></div>
                @include('form.textarea',['var'=>['name'=>'delivery_note','label'=>'Delivery Note', 'div'=>'col-md-6']])
                <div class="clearfix"></div>
                @include('form.datetime',['var'=>['name'=>'created_at','label'=>'Created At', 'div'=>'col-md-3']])
                @include('form.datetime',['var'=>['name'=>'ordered_at','label'=>'Ordered At', 'div'=>'col-md-3']])
                @include('form.datetime',['var'=>['name'=>'accepted_at','label'=>'Accepted At', 'div'=>'col-md-3','editable'=>false]])
                @include('form.datetime',['var'=>['name'=>'shipped_at','label'=>'Shipped At', 'div'=>'col-md-3','editable'=>false]])
                @include('form.datetime',['var'=>['name'=>'completed_at','label'=>'Completed At', 'div'=>'col-md-3','editable'=>false]])
                @include('form.datetime',['var'=>['name'=>'cancelled_at','label'=>'Cancelled At', 'div'=>'col-md-3','editable'=>false]])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>