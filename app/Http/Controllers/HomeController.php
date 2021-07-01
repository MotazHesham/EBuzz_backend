<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{ 
    public function index()
    {  
        return view('admin.welcome');
    } 

    public function cities(){
        return view('admin.cities');
    }
    
    public function dashboard(Request $request)
    {  
        $month_bar = date("m",strtotime('now'));
        $year_bar = date("Y",strtotime('now')); 
        
        if($request->has('year_bar')){
            $year_bar = $request->year_bar;
        }
        
        if($request->has('month_bar')){
            $month_bar = $request->month_bar;
        }

        $settings1 = [
            'bar_label'                 => 'Emergencies',
            'chart_title'               => 'Emergencies Count',
            'chart_type'                => 'bar',
            'report_type'               => 'group_by_date',
            'model'                     => 'App\Models\Emergency',
            'group_by_field'            => 'created_at',
            'group_by_period'           => 'day',
            'aggregate_function'        => 'count', 
            'filter_field'              => 'created_at', 
            'group_by_field_format'     => 'd/m/Y H:i:s',
            'date_format_filter_days'   => 'd/m/Y H:i:s',
            'column_class'              => 'col-md-12',
            'entries_number'            => '5',
            'range_date_start'          => $year_bar.'/'.$month_bar.'/1 00:00:00',
            'range_date_end'            => $year_bar.'/'.$month_bar.'/31 23:59:59',
            'continuous_time'       => 'd/m/Y H:i:s',
        ];

        $chart1 = new LaravelChart($settings1);

        $emergencies =  Emergency::with('user')->get();
        return view('admin.dashboard',compact('emergencies','chart1','year_bar','month_bar'));
    } 
}
