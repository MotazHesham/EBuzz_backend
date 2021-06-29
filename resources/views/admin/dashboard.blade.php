@extends('layouts.admin')

@section('content')

<div style="background: white;padding:20px">

    <div class="row">

        <div class="col-md-8">
            <h3 class="text-center">
                Latest Emergencies
            </h3>
            <hr width="350">
            <div class="mt-4" id="map" style="width: 750px;height:500px"></div>
        </div>

        <div class="col-md-4"> 
            <div class="card text-white bg-info mt-5" style="position: relative">
                <div style="position: absolute;right:0">
                    <i style="font-size: 91px;color:#082a482e" class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                </div>
                <div class="card-body pb-0">
                    <div class="text-value-lg">Users</div>
                    <div style="font-weight: 900;
                    font-size: 29px;
                    padding: 0px 15px;">{{ \App\Models\User::all()->count() }}</div>
                    <br />
                </div>
            </div> 
            
            <div class="card text-white bg-danger mt-5" style="position: relative">
                <div style="position: absolute;right:0">
                    <i style="font-size: 91px;color:#082a482e" class="fa-fw fas fa-hands-helping c-sidebar-nav-icon"></i>
                </div> 
                <div class="card-body pb-0">
                    <div class="text-value-lg">Emergencies</div>
                    <div style="font-weight: 900;
                    font-size: 29px;
                    padding: 0px 15px;">{{ \App\Models\Emergency::all()->count() }} </div>
                    <br />
                </div>
            </div> 

            <div class="card" style="max-width: 30rem;">
                <div class="card-header bg-vk   content-center" style="padding: 20px">
                    <h5 class="text-white">Posts</h5>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="text-value-xl">{{ \App\Models\Post::where('status',0)->get()->count() }}</div>
                        <div class="text-uppercase text-muted small">Pending</div>
                    </div>
                <div class="vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ \App\Models\Post::where('status',1)->get()->count() }}</div>
                        <div class="text-uppercase text-muted small">Accepted</div>
                    </div>
                <div class="vr"></div>
                    <div class="col">
                        <div class="text-value-xl">{{ \App\Models\Post::where('status',2)->get()->count() }}</div>
                        <div class="text-uppercase text-muted small">Refused</div>
                    </div>
                </div>
            </div> 
            
        </div>
    </div>

    <div class="row mt-5">
        <div class="{{ $chart1->options['column_class'] }} panel" style=" padding:15px 0 0 15px;border-radius:15px;padding:30px">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="card-title mb-0">{{ __('Emergencies') }}</h4>
                    <div class="small text-muted">{{date("F", mktime(0, 0, 0, $month_bar, 10))}} - {{$year_bar}}</div>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <form action="" method="GET" id="form-line">
                        <label class="btn btn-outline-secondary">
                            <select class="form-control" name="year_bar" id="year_bar">
                                @for($i = 2021 ; $i <= 2051 ; $i++)
                                    <option value="{{$i}}" @if($year_bar == "{{$i}}") selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="submit" class="btn btn-info btn-rounded" value="fetch">
                        </label>
                        <label class="btn btn-outline-secondary">
                            <select class="form-control" name="month_bar" id="month_bar">
                                <option value="1" @if($month_bar == "1") selected @endif>{{ __('january')}}</option>
                                <option value="2" @if($month_bar == "2") selected @endif>{{ __('february')}}</option>
                                <option value="3" @if($month_bar == "3") selected @endif>{{ __('march')}}</option>
                                <option value="4" @if($month_bar == "4") selected @endif>{{ __('april')}}</option>
                                <option value="5" @if($month_bar == "5") selected @endif>{{ __('may')}}</option>
                                <option value="6" @if($month_bar == "6") selected @endif>{{ __('june')}}</option>
                                <option value="7" @if($month_bar == "7") selected @endif>{{ __('july')}}</option>
                                <option value="8" @if($month_bar == "8") selected @endif>{{ __('august')}}</option>
                                <option value="9" @if($month_bar == "9") selected @endif>{{ __('september')}}</option>
                                <option value="10" @if($month_bar == "10") selected @endif>{{ __('october')}}</option>
                                <option value="11" @if($month_bar == "11") selected @endif>{{ __('november')}}</option>
                                <option value="12" @if($month_bar == "12") selected @endif>{{ __('december')}}</option>
                            </select>
                        </label> 
                    </form>
                </div>
            </div>
            {!! $chart1->renderHtml() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-3">Latest 5 Registered Users</h3>
            <table class="table table-bordered table-striped table-hover datatable datatable-Users">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Name</td>
                        <td>Phone</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\User::orderBy('created_at','desc')->get()->take(5) as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                {{$user->first_name . " " . $user->last_name}}
                            </td>
                            <td>
                                {{$user->phone}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6"> 
            <h3 class="mb-3">Latest 5 Added Posts</h3>
            <table class="table table-bordered table-striped table-hover datatable datatable-Post">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Name</td> 
                        <td>description</td> 
                        <td>Photo</td> 
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Post::orderBy('created_at','desc')->get()->take(5) as $post)
                        <tr>
                            <td>
                                {{$post->id}}
                            </td>
                            <td>
                                {{$post->user->first_name . ' ' . $post->user->name}}
                            </td> 
                            <td>
                                {{$post->description}}
                            </td>
                            <td>
                                <img src="{{asset("storage/".$post->photo)}}" width="50" height="50">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('scripts')
@parent  
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> {!! $chart1->renderJs() !!}
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDDHaXjuV0i_Vx5w1tpMomsazWj4bHerJg&sensor=false" 
    type="text/javascript"></script>

<script type="text/javascript">
    var locations = [
        @foreach($emergencies as $emergency)
            ['{{$emergency->user->first_name}}', '{{$emergency->latitude}}', '{{$emergency->longitude}}', '{{$emergency->id}}'],
        @endforeach
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(locations[0][1], locations[0][2]),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>
@endsection