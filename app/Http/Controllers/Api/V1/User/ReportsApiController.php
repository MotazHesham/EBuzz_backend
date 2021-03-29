<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Traits\api_return;
use App\Models\Report;
use App\Models\User;
  
class ReportsApiController extends Controller
{
    //
    use api_return;

    
    public function addReport(Request $request){


      $rules = [
        'reason' => 'required',
        'user_reported_id'=>'required',
        
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return $this->returnError('401', $validator->errors());
    }


     $user=User::find($request->user_reported_id);
      $reason = Report::where('reason',$request->reason)->first();
        $user->reports()->attach($request->user_reported_id,['user_reporter_id'=>auth()->user()->id ,
                                 'user_reported_id'=>$request->user_reported_id,
                                  'report_id'=>$reason->id,
                                  'note'=>$request->note,
        ]);
      
       return $this->returnSuccessMessage('Your report has been successfully registered ');
       
    }
    //-----------------------------------------------
}
