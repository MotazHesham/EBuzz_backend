<?php

namespace App\Http\Controllers\Api\V1\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\api_return;
use App\Models\Contact;
use App\Http\Resources\V1\User\ContactResource;
use Auth;

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

        $contact=Contact::find(Auth::id());

        $new = new ContactResource($contact);

        return $this->returnData($new , "success");


    }
}


