@extends('template.app-frame')
<?php
/**
 * Variables used in this view file.
 * @var $moduleName string 'superheroes'
 * @var $currentModule Module
 * @var $superhero Superhero Object that is being edited
 * @var $element string 'superhero'
 * @var $currentModule Module
 * @var $changes \Illuminate\Database\Eloquent\Collection
 */
?>
@section('sidebar-left')
    @include('mainframe.modules.base.include.sidebar-left')
@endsection

@section('title')
    Change log
@endsection

@section('content')
    <table class="table table-bordered table-mailbox table-condensed table-hover" id="changelist" >
        <thead>
        <tr>
            <th>id</th>
            <th>Change set</th>
            <th>Event</th>
            <th>Field</th>
            <th>Old</th>
            <th>New</th>
            <th>Updated By</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
            @foreach($changes as $change)
                <tr>
                    <td>{{$change->id}}</td>
                    <td>{{$change->changeset}}</td>
                    <td>{{$change->name}}</td>
                    <td>{{$change->field}}</td>
                    <td>{{$change->old}}</td>
                    <td>{{$change->new}}</td>
                    <?php $updatedby_email=\App\User::find($change->updated_by)->email; ?>
                    <td>{{$updatedby_email}}</td>
                    <td>{{$change->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    @parent
    <script>
        // datatable
        var table = $('#changelist').dataTable( {
            "bPaginate": false
        } );
    </script>
@endsection

