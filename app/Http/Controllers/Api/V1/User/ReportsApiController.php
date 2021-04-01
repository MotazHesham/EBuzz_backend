<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use App\Traits\api_return;
use Illuminate\Http\Request;
use Validator;

class ReportsApiController extends Controller
{

    use api_return;

    public function store(Request $request)
    { 

        $rules = [
            'report_id' => 'required',
            'user_reported_id' => 'required', 
            'note' => 'nullable|max:100'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $user = User::find($request->user_reported_id); 
        $user->reports()->attach(
            $request->user_reported_id, 
          [
            'user_reporter_id' => auth()->user()->id,
            'user_reported_id' => $request->user_reported_id,
            'report_id' => $request->report_id,
            'note' => $request->note,
          ]
        );

        return $this->returnSuccessMessage('Your report has been successfully Sent');

    }
}
