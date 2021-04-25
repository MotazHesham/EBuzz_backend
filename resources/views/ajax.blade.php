@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Contacts
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Contact">
                <thead>
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            First Name
                        </th>
                        <th>
                            Last Name
                        </th>
                        <th>
                            Phone
                        </th> 
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
                ajax: "{{ route('ajax') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'phone', name: 'phone' }, 
                ], 
                pageLength: 10,
            };
            
            let table = $('.datatable-Contact').DataTable(dtOverrideGlobals); 
        
        });
    });
    

</script>
@endsection