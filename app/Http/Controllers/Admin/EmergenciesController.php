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
       /*     $query = User::has('emergency')->with('emergency');

            $table = Datatables::of($query);

            return $table->addColumn('emergency_date', function (User $User) {
                return $User->emergency->date;})->addColumn('emergency_lat', function (User $User) {
                    return $User->emergency->latitude;})->addColumn('emergency_long', function (User $User) {
                        return $User->emergency->longitude;})->make(true);
        }*/


            $query = Emergency::with('User');
            $table = Datatables::of($query);

            return $table->addColumn('User_firstName', function (Emergency $emergency) {
                return $emergency->user->first_name;})->addColumn('User_Last_Name', function (Emergency $emergency) {
                    return $emergency->user->last_name;})->addColumn('User_Phone', function (Emergency $emergency) {
                        return $emergency->user->phone;})->addColumn('action', function( Emergency $row){

                            $actionBtn = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="initMap('.$row->latitude .','.$row->longitude.')">Show Location</button>';
                            return $actionBtn;
                        })
                        ->rawColumns(['action'])->make(true);
        }

        return view('admin.showEmergency');


    }
}
