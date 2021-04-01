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
        $emergencies = Emergency::where('user_id',Auth::id())->get(); 
        return $this->returnData(EmergencyResource::collection($emergencies));
    }
}
