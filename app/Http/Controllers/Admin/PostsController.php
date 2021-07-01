<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; 
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{
    public function posts(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::with('user')->get();

            $table = Datatables::of($query); 

            $table->editColumn('action',function($row){ 
                $accept = '<a style="box-shadow: 0px 0px 7px #7DCEA0;" href="'.route('posts.change_status',['id'=>$row->id,'status'=>1]).'" class="btn btn-outline-success btn-pill">Accept</a>';
                $refused = '<a style="box-shadow: 0px 0px 7px change_status;" href="'.route('posts.change_status',['id'=>$row->id,'status'=>2]).'" class="btn btn-outline-danger btn-pill">Refuse</a>';
                return $accept . $refused;
            });  

            $table->editColumn('first_name',function($row){
                return $row->user->first_name . " " . $row->user->last_name;
            }); 
            $table->editColumn('phone',function($row){
                return $row->user->phone;
            });  
            $table->editColumn('city',function($row){
                return $row->city ? $row->city->name : '';
            });  
            $table->editColumn('photo',function($row){
                return '<img src="'.asset("storage/".$row->photo).'" width="75" height="75">';
            });  
            $table->editColumn('status',function($row){
                if($row->status == 0){
                    return 'pending';
                }elseif($row->status == 1){
                    return 'accepted';
                }elseif($row->status == 2){
                    return 'refused';
                }
            }); 
            
            $table->rawColumns(['action', 'photo']);
            
            return $table->make(true);

        }

        return view('admin.posts');
    }

    public function change_status($id,$status){
        $post = Post::findOrFail($id); 
        $post->status = $status;
        $post->save();
        return redirect()->route('posts');
    }
}
