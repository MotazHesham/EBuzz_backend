@extends('layouts.sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reports </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="{{asset('js/side.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    @section('con')
    <div class="card">
        <div class="card-header">
          Reports
        </div>
        <div class="card-body">
            @if(!empty($reports))

            <h5 class="card-title">Number of reports</h5>
            <p class="card-text">{{$num}}</p>
          <h5 class="card-title">The Reasons of reports</h5>
          @foreach ($reports as $report)
          <p class="card-text">{{$report->reason}}</p>
          @endforeach
          <h5 class="card-title">The time of reports</h5>
          @foreach ($reports as $report)
          <p class="card-text">{{$report->created_at}}</p>
          @endforeach
          <a href="#" class="btn btn-primary">Block</a>
          <a href="{{route('showuser')}}" class="btn btn-primary">Go Back</a>

        </div>
      </div>

      @endif

</body>
@endsection
</html>



