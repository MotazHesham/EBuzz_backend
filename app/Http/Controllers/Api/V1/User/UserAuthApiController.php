<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\api_return;
use App\Models\User;
use App\Models\Role;
use Validator;
use Auth;

class UserAuthApiController extends Controller
{
    use api_return;

    public function register(Request $request){

        $rules = [
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|max:20|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $role = Role::where('title','User')->first();

        $user = new User();
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->role_id = $role->id;
        $user->save();

        return $this->returnSuccessMessage(__('Registered Successfully'));

    }

    // -----------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------------

    public function login(Request $request){

        $rules = [
            'phone' => 'required',
            'password' => 'required|min:6|max:20'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $token = Auth::user()->createToken('User')->plainTextToken;
            return $this->returnData($token);
        } else {
            return $this->returnError('401',__('invalid username or password'));
        } 
    }
}
