<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;
use Yajra\DataTables\Facades\DataTables;


class ReportsController extends Controller
{

       public function getReports(Request $request){

        $reports=DB::table('report_users')->where('user_reported_id', $request->id)->join('Users', 'users.id', '=', 'report_users.user_reported_id')->join('reports', 'reports.id', '=', 'report_users.report_id');
        $num=$reports->count();
        if($num==0)
      return redirect()->back();
      else
      $reports= $reports->get();
       return view('admin.ReportDetails',compact('reports','num'));
    }
}
