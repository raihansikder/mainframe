<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#product_information">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Product Information
                </a>
            </h5>
        </div>
        <div id="product_information" class="panel-collapse collapse" style="margin:15px 0;">
            <div class="col-md-12">
                @include('form.text',['var'=>['name'=>'weight','label'=>'Weight (KG)', 'div'=>'col-md-2']])
                @include('form.text',['var'=>['name'=>'width','label'=>'Width (CM)', 'div'=>'col-md-2']])
                @include('form.text',['var'=>['name'=>'height','label'=>'Height (CM)', 'div'=>'col-md-2']])
                @include('form.text',['var'=>['name'=>'length','label'=>'Length (CM)', 'div'=>'col-md-2']])

                <?php
                $var_ship_from_country = [
                    'name'        => 'manufacturer_country_id',
                    'label'       => 'Manufacturer Country',
                    'table'       => 'countries',
                    'value_field' => 'id',
                    'div'         => 'col-md-3',
                    'params'      => [
                        'class' => 'validate[required]',
                    ]
                ];
                ?>
                @include('form.select-model',['var'=>$var_ship_from_country])
                @include('form.text',['var'=>['name'=>'harmonized_code','label'=>'FedEx Harmonized code','div'=>'col-md-3']])
                <div class="clearfix"></div>
                @include('form.textarea',['var'=>['name'=>'description','label'=>'Description']])
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>