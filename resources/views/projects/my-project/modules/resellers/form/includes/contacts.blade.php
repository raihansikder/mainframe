<div class="col-md-12">



    <h4>Key Contact</h4>
    <div>
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            @if(count($element->contacts))
                @foreach($element->contacts as $contact)
                    <tbody>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->designation}}</td>
                        <td>{{$contact->phone}}</td>
                        <td><a class="btn btn-xs btn-default flat"
                               href="{{route('contacts.edit',$contact->id)}}"><i
                                    class="fa fa-edit"></i></a></td>
                    </tr>
                    </tbody>
                @endforeach
            @else
                <tbody>
                <tr>
                    <td colspan="5">{{'No contact available'}}</td>
                </tr>
                </tbody>
            @endif
        </table>
    </div>
    <div>
        <a class="btn btn-default pull-right" title="Create new contact" target="_blank"
           href="{{$contactCreateUrl}}">
            <i class="fa fa-plus"></i>Add Contact </a>

    </div>
</div>