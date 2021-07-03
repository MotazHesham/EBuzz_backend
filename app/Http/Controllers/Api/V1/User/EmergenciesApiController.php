<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Emergency; 
use App\Models\Notification; 
use App\Models\User; 
use App\Traits\api_return;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Resources\V1\User\EmergencyResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class EmergenciesApiController extends Controller
{
    use api_return;

    public function history(Request $request){
        $emergencies = Emergency::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(10); 
        $new = EmergencyResource::collection($emergencies);
        return $this->returnPaginationData($new,$emergencies,"success"); 
    }
    
    public function activity(Request $request){
        $emergencies = Emergency::where('user_id','!=',Auth::id())->orderBy('status','desc')->orderBy('created_at','desc')->paginate(10); 
        $new = EmergencyResource::collection($emergencies);
        return $this->returnPaginationData($new,$emergencies,"success"); 
    }

    public function stop($id,$feedback){
        $emergency = Emergency::find($id);
        $emergency->status = 0;
        $emergency->feedback = $feedback;
        $emergency->save();
        return $this->returnSuccessMessage('Success Closed Live');
    }
    
    public function start()
    {
        

        $user = Auth::user();
        
        $emergency = new Emergency;
        $emergency->user_id = $user->id;
        $emergency->country = $user->country;
        $emergency->city = $user->city;
        $emergency->country_code = $user->country_code;
        $emergency->state = $user->state;
        $emergency->road = $user->road;
        $emergency->latitude = $user->latitude;
        $emergency->longitude = $user->longitude;
        $emergency->mssg_count = count($user->contacts);
        $emergency->save();

        $nearst_users = User::where('id','!=',$user->id)->where('road', $user->road)->get();
        if ($nearst_users->count() < 50){
            $nearst_users = User::where('id','!=',$user->id)->where('city', $user->city)->get();
            if($nearst_users->count() < 50){
                $nearst_users = User::where('id','!=',$user->id)->where('state', $user->state)->get(); 
                if($nearst_users->count() < 50){
                    $nearst_users = User::where('id','!=',$user->id)->where('country', $user->country)->get(); 
                    if($nearst_users->count() < 50){
                        $nearst_users = User::where('id','!=',$user->id)->get(); 
                    }
                }
            } 
        }

        foreach($nearst_users as $raw){
            
            $notification = new Notification;
            $notification->user_id = $raw->id;
            $notification->emergency_id = $emergency->id;
            $notification->save();
            
            Http::withHeaders([
                'Authorization' => 'key=AAAAfpJcMgM:APA91bEc3DcmbHMKwRER3RBvN0u0NnBqpa9_bF-qZP3FxCPzdHCOjT1XkaRaGM6_u2xub_ud8ozZsGbEnHUY4fwbjXKopPCkr61uBLuP1xsAkb4kQ4qGPgc9JGuNPSsFWDxvzkEKsxlq',
                'Content-Type' =>   'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', [
                "to" => $raw->fcm_token,
                "collapse_key" => "type_a",
                "notification" => [
                    "title"=> "Emergency!!",
                    "body" =>  $user->first_name . " " . $user->last_name . ' in danger near you in ' . $user->road . ' in ' . $user->city . ' need help'
                ]
            ]);
        }

        return $this->returnData($emergency->id);
        
}
}