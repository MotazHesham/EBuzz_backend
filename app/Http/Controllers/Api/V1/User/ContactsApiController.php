<?php

namespace App\Http\Controllers\Api\V1\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\api_return;
use App\Models\Contact;
class ContactsApiController extends Controller
{
    // use the trait for api formating
    use api_return;

         
   public function addContact(Request $request){
              
   $contacts= $request->all();
       
   for($i=0;$i<5;$i++){
                $contact=new Contact();
                $contact->phone=$contacts[$i]['phone'];
                $contact->first_name=$contacts[$i]['first_name'];
                $contact->last_name=$contacts[$i]['last_name'];
                $contact->user_id=auth()->user()->id;
                $contact->save();
             
   }
   return $this->returnSuccessMessage('Registered Successfully');

   }


//-------------------------delete function
    public function deleteContact($id){

        $contact=Contact::find($id);

        if(!$contact)
    
        return $this->returnError('401',('this contact already deleted'));
         else   
        $contact->delete();
        return $this->returnSuccessMessage('this contact deleted Successfully');
       
    
        }
    }
    

