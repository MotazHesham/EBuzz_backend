<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Emergency;
use App\Models\User;
use App\Traits\api_return;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Resources\V1\User\ReportResource;

class ReportsApiController extends Controller
{

    use api_return;

    public function index(Request $request){
      $reports = Report::all(); 
      return $this->returnData(ReportResource::collection($reports));
    }

    //---------------------------------------------------------------

    public function store(Request $request)
    { 

        $rules = [
            'emergency_id' => 'required',
            'reason' => 'nullable|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        } 

        $user_reported_id = Emergency::find($request->emergency_id)->user_id; 

        $reported_user = User::find($user_reported_id);

        $reported_user->users()->attach(
          Auth::id(), 
          [
            'reason' => $request->reason,
          ]
        );

        return $this->returnSuccessMessage('Your report has been successfully Sent');

    }
}
