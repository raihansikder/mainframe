<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\Vendors\Vendor $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */

$margins = $element->margins;
$createBtnLink = route('margins.create')
    .'?reseller_id='.$element->id
    .'&ret=reseller'
    .'&is_active=1';
// ."&redirect_success=".URL::full()
?>

<div class="clearfix"></div>

<h4 class="pull-left">Custom Margins</h4>
<a class="btn btn-default pull-right" href="{{$createBtnLink}}" title="Add a margin">
    <i class="fa fa-plus"></i>
</a>
<table id="tableVariants" class="table datatable-min">
    <thead>
    <tr id="header">
        <th>Name</th>
        <th>Percent</th>
        <th>Active</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($margins as $margin)
        <?php
        /** @var \App\Projects\MphMarket\Modules\Margins\Margin $margin */
        $link = route('margins.edit', $margin->id);
        // ."?redirect_success=".URL::full();
        if ($editable) {
            $deleteBtnVar = [
                'route'            => route('margins.destroy', $margin->id),
                'redirect_success' => URL::full(),
                'value'            => "<i class='fa fa-remove'></i>",
                'params'           => [
                    'class' => 'btn btn-danger btn-xs flat'
                ]
            ];
        }
        ?>
        <tr>
            <td><a href="{{$link}}">{{$margin->name_ext}}</a></td>
            <td>{{$margin->getPercent()}}%</td>
            <td>@if($margin->is_active){{"Yes"}}@else {{"No"}}@endif</td>
            <td style="text-align: right">
                @if($editable)
                    @include('form.delete-button',['var'=>$deleteBtnVar])
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
