<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Resources\V1\User\NotificationResource;
use App\Traits\api_return;
use Validator;   
use Auth;

class NotificationsAPiController extends Controller
{
    use api_return;

    public function user_notifications(){

        $notification = Notification::where('user_id',Auth::id())->with('emergency.user')->orderBy('created_at','desc')->paginate(10);
        $new = NotificationResource::collection($notification);

        return $this->returnPaginationData($new,$notification,"success"); 
    }
}
