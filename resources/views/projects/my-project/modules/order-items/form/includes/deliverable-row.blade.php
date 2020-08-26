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
/** @var \App\Projects\MphMarket\Modules\Deliverables\Deliverable $deliverable */
$isBundle = $deliverable->product->isBundle();
?>

<tr>
    <td>
        @if($isBundle || !$deliverable->bundle_product_id)
            <a href="{{route('deliverables.edit',$deliverable->id)}}" class="badge">
                {{$deliverable->id}}
            </a>
        @endif
    </td>
    <td class="{{ $isBundle ? 'h4' : '' }}">
        @if(!$isBundle && $deliverable->bundle_product_id)
            <a href="{{route('deliverables.edit',$deliverable->id)}}" class="badge">
                {{$deliverable->id}}
            </a>
        @endif

        @if($isBundle)
            <span class="badge bg-orange">Bundle</span>
        @endif
        &nbsp;&nbsp;&nbsp;
        <a href="{{route('products.edit',$deliverable->product->id)}}">
            {{$deliverable->product->name_ext}}
        </a>
    </td>
    <td>
        @if($deliverable->stockItem)
            <?php
            $stockItemLink = null;
            if ($user->isAdmin()) {
                $stockItemLink = route('stock-items.edit', $deliverable->stockItem->id);
            }
            ?>
            @if($stockItemLink)
                <a href="{{$stockItemLink}}">
                    <pre>{{$deliverable->stockItem->code}}</pre>
                </a>
            @else
                <pre>{{$deliverable->stockItem->code}}</pre>
            @endif
        @endif
    </td>
    <td>
        @if($user->isAdmin())
            @if($isBundle)
                <input type="checkbox" data-deliverable_id="{{$deliverable->id}}"
                       class="parent-check-box">
                <label> Select bundle</label>
            @else
                <?php
                /** @var \App\Projects\MphMarket\Modules\Deliverables\Deliverable $deliverable */
                $var = [
                    'name'          => 'deliverable_status['.$deliverable->id.']',
                    'checked_val'   => 1,
                    'unchecked_val' => 0,
                    'params'        => [
                        // 'id' => 'deliverable_status_'.$deliverable->id
                        'class'               => 'deliverable-checkbox',
                        'data-deliverable_id' => $deliverable->id,
                        'data-parent_id'      => $deliverable->parent_id
                    ],
                    'value'         => ($deliverable->status == 'Delivered') ? 1 : 0
                ];
                ?>
                @include('form.checkbox',['var'=>$var])
            @endif
            <?php
            $var = [
                'name'   => 'delivery_date['.$deliverable->id.']',
                'params' => ['id' => 'date_'.$deliverable->id],
                'value'  => $deliverable->delivered_at,
                'div'    => 'col-md-12'
            ];
            ?>
            @include('form.datetime',['var'=>$var])
        @endif
    </td>
    <td>
        @if($deliverable->stockItem)
            @if(!$deliverable->stockItem->warranty_starts_on)
                <?php
                $warrantyRegistrationLink = route('stock-item.view-warranty', $deliverable->stockItem->uuid);
                ?>
                @if($user->isAdmin())
                    <?php
                    $var = [
                        'title'   => "<a class='btn btn-default'  target='_blank' href='{$warrantyRegistrationLink}'>Register</a>",
                        'content' => $warrantyRegistrationLink
                    ]
                    ?>
                    @include('projects.my-project.layouts.custom.qr-code', $var)
                @else
                    <a class='btn btn-default' target='_blank' href='{{$warrantyRegistrationLink}}'>Register</a>
                @endif
            @else
                <b>Warranty Registered</b> <br/>
                {{formatDate($deliverable->stockItem->warranty_starts_on)}}
                - {{formatDate($deliverable->stockItem->warranty_ends_on)}}
            @endif
        @endif
    </td>
</tr>

