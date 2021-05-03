@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
           Users
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Contact">
                    <thead>
                    <tr>

                        <th> id </th>
                        <th> Phone </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> address </th>
                        <th> gender </th>
                        <th> date_of_birth </th>
                        <th> sms_alert </th>
                        <th> city </th>
                        <th> country </th>
                        <th>role_id</th>


                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script>

        $(document).ready(function(){
            $(function () {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


                let dtOverrideGlobals = {
                    buttons: dtButtons,
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    aaSorting: [],
                    ajax: "{{ route('showuser') }}",
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'phone', name: 'phone' },
                        { data: 'first_name', name: 'first_name' },
                        { data: 'last_name', name: 'last_name' },
                        { data: 'address', name: 'address' },
                        { data: 'gender', name: 'gender' },
                        { data: 'date_of_birth', name: 'date_of_birth' },
                        { data: 'sms_alert', name: 'sms_alert' },
                        { data: 'city', name: 'city' },
                        { data: 'country', name: 'country' },
                        { data: 'role_id', name: 'role_id' },


                    ],
                    pageLength: 10,
                };

                let table = $('.datatable-Contact').DataTable(dtOverrideGlobals);

            });
        });


    </script>
@endsection
