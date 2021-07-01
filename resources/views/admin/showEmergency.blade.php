@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            Emergency
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Emergencies">
                    <thead> 
                        <tr> 
                            <th> id </th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Phone </th>
                            <th> Get Help? </th>
                            <th> Date </th>
                            <th> location </th> 
                        </tr>
                    </thead>
                    <tbody>

                    </tbody> 
                </table> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Emeregency Location</h5>
            
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div id="map" style="height: 450px;width: 450px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@parent 
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDHaXjuV0i_Vx5w1tpMomsazWj4bHerJg&libraries=&v=weekly"
    async
></script>
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
                ajax: "{{ route('showEmergency') }}",
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'User_firstName', name: 'User.firstname'},
                    { data: 'User_Last_Name', name: 'User.last_name'},
                    { data: 'User_Phone', name: 'User.phone' },
                    { data: 'feedback', name: 'feedback' },
                    { data: 'date', name: 'date'},
                    { data: 'action', name: 'action'},
                ],
                pageLength: 10,
            };

            let table = $('.datatable-Emergencies').DataTable(dtOverrideGlobals);

        });
    });


    function initMap(lat,long) {
        $('#exampleModal').modal('show');
        // The location of Uluru
        const uluru = { lat: lat, lng: long };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }

</script> 

@endsection
