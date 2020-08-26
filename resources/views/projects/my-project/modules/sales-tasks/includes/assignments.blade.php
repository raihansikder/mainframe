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
$assignments = $element->assignments;
?>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">
                <a data-toggle="collapse" href="#assignment">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Task Assignments
                </a>
            </h5>
        </div>
        <div id="assignment" class="panel-collapse collapse" style="margin:15px 0;">
            <table id="assignments" class="table">
                <thead>
                <tr id="header">
                    <th>ID.</th>
                    <th>Assignee</th>
                    <th>Assigned By</th>
                    <th>Assigned For Days</th>
                    <th>Created At</th>
                    <th>Is Closed</th>
                </tr>
                </thead>
                <tbody>
                @foreach($assignments as $assignment)
                    <tr>
                        <td><a href="{{route('assignments.edit',$assignment->id)}}">{{$assignment->id}}</a></td>
                        <td><a href="{{route('users.edit',$assignment->assigned_to)}}">{{$assignment->assignee->name}}</a></td>
                        <td><a href="{{route('users.edit',$assignment->assigned_by)}}">{{$assignment->creator->name}}</a></td>
                        <td>{{$assignment->assigned_for_days}}</td>
                        <td>{{$assignment->created_at}}</td>
                        <td>{{$assignment->is_closed}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<h3></h3>

@section('js')
    @parent


@endsection
