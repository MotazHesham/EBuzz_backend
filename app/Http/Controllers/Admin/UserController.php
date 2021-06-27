<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function user(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('users')->get();

            $table = Datatables::of($query); 

            $table->editColumn('action',function($row){
                if($row->block){
                    $toggle = 'unBlock';
                }else{
                    $toggle = 'Block';
                }
                $view =  '<button style="box-shadow: 0px 0px 7px #F4D03F;" class="btn btn-outline-warning btn-pill" onclick="view_reports('.$row->id.')">View Reports</button>';
                $block = '<a style="box-shadow: 0px 0px 7px #D98880;" href="'.route('toggle.block',$row->id).'" class="btn btn-outline-danger btn-pill">'.$toggle.'</a>';
                return $view . $block;
            });

            $table->editColumn('number_of_reports',function($row){
                return count($row->users);
            });

            $table->editColumn('phone',function($row){
                return $row->block ? $row->phone . ' (blocked)' : $row->phone;
            });

            $table->editColumn('first_name',function($row){
                return $row->first_name . " " . $row->last_name;
            });

            $table->editColumn('role_id',function($row){
                return Role::find($row->role_id)->title;
            });
            
            return $table->make(true);

        }

        return view('admin.showUsers');
    }

    public function reports_partial(Request $request){
        $user = User::with('users')->findOrFail($request->user_id); 
        return view('admin.partials_reports',compact('user'));
    }

    public function toggle_block($id){
        $user = User::findOrFail($id); 
        $user->block = $user->block ? 0 : 1;
        $user->save();
        return redirect()->route('showuser');
    }

}

