<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function user (Request $request)
    {
        if ($request->ajax()) {
            $query = User::select('id','phone', 'password', 'first_name','last_name','address','gender','date_of_birth',
                'sms_alert','city','country','role_id');

            $table = Datatables::of($query);

            return $table->make(true);
        }

        return view('admin.showUsers');
    }
}
