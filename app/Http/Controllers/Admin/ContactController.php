<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function normal(){
        $contacts = Contact::get();
        return view('normal',compact('contacts'));
    }

    public function ajax(Request $request){

        if ($request->ajax()) { 
            $query = Contact::select('id','first_name','last_name','phone');
            $table = Datatables::of($query); 

            return $table->make(true);
        }

        return view('ajax');
    }
}
