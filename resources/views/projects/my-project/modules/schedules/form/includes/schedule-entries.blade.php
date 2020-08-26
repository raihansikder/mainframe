@section('css')
    <style>
        .Executed {
            /*background: forestgreen;*/
            color: forestgreen;
        }
    </style>
@endsection

<?php
/**
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Projects\MphMarket\Modules\Schedules\Schedule $element
 */

use App\Projects\MphMarket\Modules\Schedules\Schedule;
?>
<div class="col-md-6 no-padding no-margin">
    <?php
    $scheduleEntries = $element->scheduleEntries()->oldest('execute_at')->get();
    ?>
    <h4 class="pull-left">Scheduled Execution Dates</h4>
    <table id="scheduleEntryTable" class="table table-striped table-condensed">
        <thead>
        <tr>
            <th>Execute at</th>
            <th>Active</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($scheduleEntries as $scheduleEntry)
            <tr>
                <td>
                    <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                    <a href="{{route('schedule-entries.edit',$scheduleEntry->id)}}">
                        {{formatDateTime($scheduleEntry->execute_at)}}
                    </a>
                </td>
                <td>{{$scheduleEntry->is_active == 1 ? 'Yes': 'No'}}</td>
                <td class="{{$scheduleEntry->status}}">{{$scheduleEntry->status}}</td>
                <td><a class="pull-right btn btn-primary btn-xs" href="{{route('schedule-entries.execute',$scheduleEntry->id)}}">Execute</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>