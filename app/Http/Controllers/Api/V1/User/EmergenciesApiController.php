<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Emergency; 
use App\Traits\api_return;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Resources\V1\User\EmergencyResource;

class EmergenciesApiController extends Controller
{
    use api_return;

    public function history(Request $request){
        $emergencies = Emergency::where('user_id',Auth::id())->paginate(10); 
        $new = EmergencyResource::collection($emergencies);
        return $this->returnPaginationData($new,$emergencies,"success"); 
    }
    
    public function activity(Request $request){
        $emergencies = Emergency::paginate(10); 
        $new = EmergencyResource::collection($emergencies);
        return $this->returnPaginationData($new,$emergencies,"success"); 
    }
    
        public function StartEmergency()
    {

        $nerest11 = User::select('id')->where('id','!=',Auth::id())->where('road', Auth::user()->road)->get();
        if ($nerest11->count() >= 50){
            return $this->returnData($nerest11 , "success");
        }else{
            $nerest21 = User::select('id')->where('id','!=',Auth::id())->where('state', Auth::user()->state)->get();
            if($nerest21->count() >= 50){
                return $this->returnData($nerest21 , "success");
            }else{
                $nerest31 = User::select('id')->where('id','!=',Auth::id())->where('city', Auth::user()->city)->get();
                return $this->returnData($nerest31 , "success");
            }
        } 
        

    }
}
