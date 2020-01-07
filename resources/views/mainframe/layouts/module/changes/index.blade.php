@extends('mainframe.layouts.default.template')

@section('title')
    Change log
@endsection

@section('content')
    <table class="table table-bordered table-mailbox table-condensed table-hover" id="changelist">
        <thead>
        <tr>
            <th>id</th>
            <th>Changes</th>
        </tr>
        </thead>
        <tbody>

        @foreach($audits as $audit)
            <?php
            /** @var \OwenIt\Auditing\Models\Audit $audit */
            $user = \App\User::remember(timer('long'))->find($audit->user_id);
            $email = $user->email;
            ?>
            <tr>
                <td>
                    {{pad($audit->id)}} @ {{$audit->updated_at}} <br/>
                    <span class="label label-info">{{ucfirst($audit->event)}}</span> <br/>
                    {{$email}}
                </td>
                <td>
                    <?php
                    $changes = $audit->getModified();
                    ?>
                    <table class="table table-striped table-condensed">
                        <thead class="bg-gray-light">
                        <tr>
                            <th style="width: 150px">Field</th>
                            <th>Old</th>
                            <th>New</th>
                        </tr>
                        </thead>

                        @foreach($changes as $title => $value)
                            <tbody>
                            <tr>
                                <td><code>{{$title}}</code></td>
                                <td>{{$value['old'] ?? ''}}</td>
                                <td>{{$value['new'] ?? ''}}</td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </td>
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

