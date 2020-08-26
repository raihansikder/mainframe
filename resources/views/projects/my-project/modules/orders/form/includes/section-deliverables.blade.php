@section('css')
    @parent
    <style>
        #ProductBundleTable .form-group{
            padding: 0;
            margin: 0;

        }
        #ProductBundleTable .form-control{
            padding: 0;
            margin: 0;
            height: 25px;
        }
    </style>
@endsection


<div class="clearfix"></div>
<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\OrderItems\OrderItem $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

use App\Projects\MphMarket\Modules\ItemDeliveries\ItemDelivery;
$order = $element;

?>
<div class="clearfix"></div>

<div class="col-md-12 no-padding-l">
    <h3 class="pull-left">Deliverables</h3>
    <a id="deliverables"></a>
    {{--    <a href="{{route('deliverables.index')}}?order_id={{$element->id}}"--}}
    {{--       class="pull-right" style="margin-top:20px">--}}
    {{--        View all deliverables of this order--}}
    {{--    </a>--}}

    <table id="ProductBundleTable" class="table table-hover table-condensed">
        <thead>
        <tr class="bg-black-gradient">
            <th>#</th>
            <th>Deliverable Id / Product</th>
            <th>Stock Item/ <br/> Serial</th>
            <th>Delivered?/ <br/> Delivery Date
                @if($user->isAdmin())
                    <div class="clearfix"></div>
                    <input type="checkbox" class="mark-all-delivered">
                    <label> Select all</label>
                @endif
            </th>
            <th>Warranty Registration</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->orderItems as $orderItem)
            <?php
            $mainDeliverables = $orderItem->mainDeliverables();
            ?>
            @foreach($mainDeliverables as $mainDeliverable)
                <?php
                /** @var \App\Projects\MphMarket\Modules\Deliverables\Deliverable $mainDeliverable */
                $children = $mainDeliverable->children;
                $view = 'projects.my-project.modules.orders.form.includes.deliverable-register-row';
                ?>
                @include($view,['deliverable'=>$mainDeliverable])
                {{-- Bundle Items --}}
                @foreach($children as $deliverable)
                    @include($view,['deliverable'=>$deliverable])
                @endforeach
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
<div class="clearfix"></div>


@section('js')
    @parent
    <script>

        /*
        * Check all the bundle items
        * */
        $('.parent-check-box').change(function () {
            var isChecked = $(this).is(':checked')
            var parent_id = $(this).attr('data-deliverable_id');

            $('input[data-parent_id=' + parent_id + ']')
                .prop('checked', isChecked)
                .trigger('change');
        });


        $('.mark-all-delivered').change(function () {
            var isChecked = $(this).is(':checked')

            $('.parent-check-box').prop('checked', isChecked).trigger('change');
            $('.deliverable_status  ').prop('checked', isChecked).trigger('change');
        });
    </script>
@endsection