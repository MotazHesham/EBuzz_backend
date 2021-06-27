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
                        <th width="10"> id </th>
                        <th> Phone </th>
                        <th> Name</th>
                        <th> Last Name </th>
                        <th> gender </th>
                        <th> age </th>
                        <th> sms_alert </th>
                        <th> role</th>
                        <th> reports</th>
                        <th></th>
                    </tr>
                    </thead> 
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="reports" tabindex="-1" role="dialog" aria-labelledby="reportsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportsLabel">Reports</h5>
            
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    ...
                </div>
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
                        { data: 'gender', name: 'gender' },
                        { data: 'age', name: 'age' },
                        { data: 'sms_alert', name: 'sms_alert' },
                        { data: 'role_id', name: 'role_id' },
                        { data: 'number_of_reports', name: 'number_of_reports' },
                        { data: 'action', name: 'action'},
                    ],
                    columnDefs: [{
                        visible: false,
                        targets: 3
                    },],
                    pageLength: 10,
                };

                let table = $('.datatable-Contact').DataTable(dtOverrideGlobals);

            });
        });

        function view_reports(id){
            $('#reports').modal('show');
            $.post('{{ route('partials.users_reports') }}', {_token:'{{ csrf_token() }}', user_id:id}, function(data){ 
                $('#reports .modal-body').html(null);
                $('#reports .modal-body').html(data);
            });
        }

    </script> 
@endsection
