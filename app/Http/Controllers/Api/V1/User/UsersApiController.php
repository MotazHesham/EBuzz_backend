<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Resources\V1\User\UserResource;
use App\Traits\api_return;
use Validator;
use Illuminate\Support\Facades\Storage;

class UsersApiController extends Controller
{
    use api_return;

    public function update_location(Request $request){

        $rules = [
            'country' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'country' => 'nullable',
            'country_code' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
            'road' => 'nullable',
        ];
        $user = Auth::user();
        $user->country = $request->country;
        $user->city = $request->city;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->country = $request->country;
        $user->country_code = $request->country_code;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->road = $request->road;
        $user->save();

        return $this->returnSuccessMessage('Location Updated');
    }

    public function profile()
    {

        $user = User::find(Auth::id());

        $new = new UserResource($user);

        return $this->returnData($new , "success");

    }

    public function update(Request $request){

        $rules = [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'address' => 'required|max:255',
            'gender' => 'required',
            'age' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $user=User::find(Auth::id());

        if (request()->hasFile('photo') && request('photo') != '' && request('photo') != $user->photo){
            $validator = Validator::make($request->all(), [
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if ($validator->fails()) {
                return $this->returnError('401', $validator->errors());
            }
            $user->photo = Storage::disk('public')->put('uploads/user', $request->photo);
            $user->save();
        }

        if(!$user)
            return $this->returnError('404', "User Not Found");

        $user->update($request->except('photo'));


        return $this->returnSuccessMessage(__('Profile Updated Successfully'));
    }

    public function update_sms_alert(Request $request){

        $rules = [
            'sms_alert' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $user=User::find(Auth::id());

        if(!$user)
            return $this->returnError('404', "User Not Found");

        $user->update($request->all());


        return $this->returnSuccessMessage(__('Sms ALert Updated Successfully'));
    }

    public function update_fcm_torkn(Request $request){

        $rules = [
            'fcm_token' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $user=User::find(Auth::id());

        if(!$user)
            return $this->returnError('404', "User Not Found");

        $user->update($request->all());


        return $this->returnSuccessMessage(__('Token Updated Successfully'));
    }


    public function search_nearest()
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
