<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\User\NotificationResource;
use App\Models\Emergency;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Resources\V1\User\UserResource;
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
        $user = Auth::user();
        $user->country = $request->country;
        $user->city = $request->city;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->save(); 

        return $this->returnSuccessMessage('Location Updated');
    }
    public  function  user_profile()
    {

        $user = User::get();

        $new = UserResource::collection($user);

        return $this->returnData($new , "success");


    }  
public function update(Request $request){

    $rules = [
        'phone'=>'required|max:255',
       'first_name' => 'required|max:30',
        'last_name' => 'required|max:30',
        'address' => 'required|max:255',
        'gender' => 'required',
        'date_of_birth' => 'required|max:255',
        'sms_alert' => 'required|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

$user=User::find($request->id)->update($request -> all());

        if(!$user)
            return $this->returnError('404', "error");


        return $this->returnSuccessMessage(__('updated Successfully'));

    }

public function notification(){

    $notification = Notification::with('emergency.user')->orderBy('created_at','desc')->paginate(5);
    $new = NotificationResource::collection($notification);

   return $this->returnPaginationData($new,$notification,"success");


}
}
