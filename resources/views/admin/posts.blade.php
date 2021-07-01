@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            Posts
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-posts">
                    <thead>
                    <tr>
                        <th width="10"> id </th>
                        <th> Phone </th>
                        <th> Name</th>
                        <th> Description </th>
                        <th> city </th>
                        <th> Photo </th>
                        <th> Status </th>
                        <th></th>
                    </tr>
                    </thead> 
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
                    ajax: "{{ route('posts') }}",
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'phone', name: 'phone' },
                        { data: 'first_name', name: 'first_name' },
                        { data: 'description', name: 'description' },  
                        { data: 'city', name: 'city.name' },  
                        { data: 'photo', name: 'photo' },  
                        { data: 'status', name: 'status' },  
                        { data: 'action', name: 'action'},
                    ],
                    pageLength: 10,
                };

                let table = $('.datatable-posts').DataTable(dtOverrideGlobals);

            });
        });


    </script> 
@endsection
