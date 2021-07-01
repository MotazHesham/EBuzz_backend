<table class="table">
    <thead>
        <tr>
            <td>Name</td>
            <td>Phone</td>
            <td>Reason</td>
        </tr>
    </thead>
    <tbody>
        @foreach($user->users as $row)
            <tr>
                <td>{{$row->first_name . " " . $row->last_name}}</td>
                <td>{{$row->phone}}</td>
                <td> 
                    {{$row->pivot->reason ?? ''}} 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>