@extends('mainframe.layouts.default.layout')


@section('title')
    Change log
@endsection

@section('content')
    <table class="table table-bordered table-mailbox table-condensed table-hover" id="changelist">
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
                <td>{{$change->change_set}}</td>
                <td>{{$change->name}}</td>
                <td>{{$change->field}}</td>
                <td>{{$change->old}}</td>
                <td>{{$change->new}}</td>
                <?php $updatedby_email = \App\User::find($change->updated_by)->email; ?>
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
        var table = $('#changelist').dataTable({
            "bPaginate": false
        });
    </script>
@endsection

