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
?>
<div class="clearfix"></div>
<h3>Linked stock items</h3>
<ul class="list-group col-md-8">
    @foreach($element->stockItems as $stockItem)
        <li class="list-group-item pull-left">
            <div class="col-md-6">
                <a class="btn btn-default"
                   href="{{route('stock-items.edit',$stockItem->id)}}">{{pad($stockItem->id,3)}}</a>
                SL.{{$stockItem->code}}
                - {{$stockItem->name}}
            </div>

            <div class="col-md-6">
                @include('projects.my-project.layouts.custom.qr-code',['content'=>route('stock-item.view-warranty',$stockItem->uuid)])
            </div>
        </li>
    @endforeach
</ul>
<div class="clearfix"></div>