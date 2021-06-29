<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Emergency;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class EmergenciesController extends Controller
{ 

    public function getEmergency(Request $request){

        if ($request->ajax()) { 

            $query = Emergency::with('user')->get();
            $table = Datatables::of($query);


            $table->editColumn('action',function($row){
                return '<button type="button" class="btn btn-outline-info btn-pill" style="box-shadow: 0px 0px 7px #2980B9;"  onclick="initMap('.$row->latitude .','.$row->longitude.')">Show Location</button>';
            });
            $table->editColumn('User_firstName',function($row){
                return $row->user->first_name ?? '';
            });
            $table->editColumn('User_Last_Name',function($row){
                return $row->user->last_name ?? '';
            });
            $table->editColumn('User_Phone',function($row){
                return $row->user->phone ?? '';
            });
            $table->editColumn('date',function($row){
                return $row->created_at ?? '';
            });
            
            return $table->make(true); 
        }

        return view('admin.showEmergency'); 
    }
}
