<table class="table">
    <thead>
        <tr>
            <td>Name</td>
            <td>Phone</td>
            <td>Report</td>
            <td>Note</td>
        </tr>
    </thead>
    <tbody>
        @foreach($user->users as $row)
            <tr>
                <td>{{$row->first_name . " " . $row->last_name}}</td>
                <td>{{$row->phone}}</td>
                <td> 
                    {{$row->pivot->report_id ? \App\Models\Report::find($row->pivot->report_id)->reason ?? ''  : ''}} 
                </td>
                <td> 
                    {{$row->pivot->note ?? ''}} 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>