<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function user (Request $request)
    {
        if ($request->ajax()) {
            $query = User::select('id','phone', 'password', 'first_name','last_name','address','gender','date_of_birth',
                'sms_alert','city','country','role_id');

            $table = Datatables::of($query);

            return $table->addColumn('number_of_reports', function ($query) {

                $num=DB::table('report_users')->where('user_reported_id',$query->id)->count();
                return $num ;})->addColumn('action', function( $query){
                            $actionBtn = '<button type="button" class="btn btn-primary"   onclick="getReports('.$query->id .')" >Show Details</button>';
                            return $actionBtn;
                        })
                        ->rawColumns(['action'])->make(true);


        }

        return view('admin.showUsers');
    }


}

