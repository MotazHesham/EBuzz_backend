<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Traits\api_return;
use Validator;

class UsersApiController extends Controller
{
    use api_return;

    public function update_location(Request $request){

        $rules = [
            'country' => 'required',
            'city' => 'required',  
            'latitude' => 'required',  
            'longitude' => 'required',  
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $user = Auth::user();
        $user->country = $request->country;
        $user->city = $request->city;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->save(); 

        return $this->returnSuccessMessage('Location Updated');
    }
}
