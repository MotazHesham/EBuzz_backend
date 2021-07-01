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

    public function check_phone_exist(Request $request){
        $rules = [
            'phone' => 'required|regex:/^[0-9]*$/|min:11|max:20',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $user = User::where('phone',$request->phone)->first();

        if($user){
            return $this->returnSuccessMessage(true);
        }else{
            return $this->returnSuccessMessage(false);
        }
    }

    public function forgetpassword(Request $request){
        $rules = [
            'phone' => 'required|regex:/^[0-9]*$/|min:11|max:20',
            'password' => 'required|min:6|max:20|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $user = User::where('phone',$request->phone)->first();
        $user->password = bcrypt($request->password); 
        $user->save();
        
        return $this->returnSuccessMessage('success change phone');
    }

    public function register(Request $request){

        $rules = [
            'phone' => 'required|regex:/^[0-9]*$/|min:11|max:20|unique:users',
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

        $token = $user->createToken('user_token')->plainTextToken;
        return $this->returnData(
            [
                'user_token' => $token,
                'user_id '=> Auth::id()
            ]
        );

    }

    // -----------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------------

    public function login(Request $request){

        $rules = [
            'phone' => 'required|regex:/^[0-9]*$/|min:11|max:20',
            'password' => 'required|min:6|max:20'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $token = Auth::user()->createToken('user_token')->plainTextToken;
            if(Auth::user()->block){ 
                return $this->returnError('500',__('You Get Blocked From Using this App')); 
            }else{
                return $this->returnData(
                    [
                        'user_token' => $token,
                        'user_id '=> Auth::id()
                    ]
                );
            }
        } else {
            return $this->returnError('500',__('invalid username or password'));
        }
    }
}
