<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var \App\Projects\MphMarket\Modules\SalesTasks\SalesTask $element
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 */
?>

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#notes">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Notes
                </a>
            </h5>
        </div>
        <div id="notes" class="panel-collapse collapse" style="margin:0 0;">
            @include('form.textarea',['var'=>['name'=>'note','label'=>'Note']])
        </div>
    </div>
</div>

@section('js')
    @parent


@endsection
