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
                ajax: "{{ route('showEmergency') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'User_firstName', name: 'User.firstname'},
                    { data: 'User_Last_Name', name: 'User.last_name'},
                    { data: 'User_Phone', name: 'User.phone' },
                    {data: 'date', name: 'date'},
                    { data: 'action', name: 'action'},
                ],
                pageLength: 10,
            };

            let table = $('.datatable-Emergencies').DataTable(dtOverrideGlobals);

        });
    });


</script>

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

    @endsection

    @section('scripts')

 <script>
     function initMap(lat,long) {
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCghF8YCx7R7S35C96tXG-AG9PWFBkCpHU&libraries=places&language=en&region=EG
async defer"></script>
<script>

</script>
@endsection