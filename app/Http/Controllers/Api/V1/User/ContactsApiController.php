<?php

namespace App\Http\Controllers\Api\V1\User;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\api_return;
use App\Models\Contact;
use App\Http\Resources\V1\User\ContactResource;
use Auth;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Str;

class ContactsApiController extends Controller
{
    // use the trait for api formating
    use api_return;

    public function store(Request $request){
        $rules = [
            'contacts' => 'required',
            'contacts.*.phone' => 'required|max:20',
            'contacts.*.first_name' => 'required|max:50',
            'contacts.*.last_name' => 'required|max:50',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        foreach ($request['contacts'] as $row){
            $contact = new Contact();
            $contact->phone = $row['phone'];
            $contact->first_name = $row['first_name'];
            $contact->last_name = $row['last_name'];
            $contact->user_id = auth()->user()->id;
            $contact->save();
        }

        return $this->returnSuccessMessage('Added Successfully');
    }


    //------------------------- delete contact -------------------------
    public function delete($id){

        $contact=Contact::find($id);

        if(!$contact){
            return $this->returnError('404',('this contact not found'));
        }else{
            $contact->delete();
            return $this->returnSuccessMessage('this contact deleted Successfully');
        }

    }

    //------------------------- view contact --------------------------

    public function view(){

        $contact=contact::where('user_id',Auth::id())->get();

        $new = ContactResource::collection($contact);

        return $this->returnData($new , "success");


    }
    public function sms(){

           $contacts=Contact::where('user_id',Auth::id())->get();

           $user=auth()->user();

   foreach( $contacts as $contact){

           $num=$contact->phone;

                 if(strlen($num)>11)
           $num=Str::substr($num,2, 11);

            $sms_alert= $user->sms_alert;

                  if(!empty($sms_alert))
            $sms='from '.$user->first_name . " " . $user->last_name .' mobile number '. $user->phone .  $sms_alert .'  in  ' . $user->road . ' in ' . $user->city  ;

                   else
            $sms='from '.$user->first_name . " " . $user->last_name .' mobile number '. $user->phone .' help me I am In danger in  '. $user->road . '  in ' . $user->city . ' need help' ;

            try{
                  Nexmo::message()->send([

                         'to' =>  '+2 '. $num,

                         'from' => $user->phone ,
                         'text' => $sms ,
                               ]);

       return response()->json($num);

}
        catch (\Exception $e) {



   return $this->returnError('404',('Something went wrong'));

}

}

}

}
