@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Roles
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('showrole') }}">

                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th> id </th>
                        <th>title </th>
                        <th> permissions </th>
                    </tr>
                    </thead>

<tbody>
@foreach ($roles as $role)
<tr>
    <td>{{$role -> id}}</td>
    <td>{{$role -> title}}</td>
    <td>
        @foreach($role->permissions as $key => $permissions)
            <span class="label label-info">({{ $permissions->title }})</span>
        @endforeach
    </td>
</tr>
@endforeach
</tbody>

                </table>

            </div>
        </div>
    </div>



@endsection
