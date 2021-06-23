<?php

namespace App\Http\Controllers\Api\V1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\api_return;
use Validator;
use Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    use api_return;


    //----------------------------------------add post

    public function create(Request $request){

         $post=new Post();
         $rules = [
            'description' => 'required',
            'city_id' => 'required',


        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }

        $post->user_id= Auth::id();
        $post->description= $request->description;
        $post->city_id= $request->city_id;

        if (request()->hasFile('photo') && request('photo') != ''){
            $validator = Validator::make($request->all(), [
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if ($validator->fails()) {
                return $this->returnError('401', $validator->errors());
            }
            $post->photo = Storage::disk('public')->put('uploads/user', $request->photo);

        }

        $post->save();
        return $this->returnSuccessMessage('post added Successfully');


      }


    //----------------------------------------delete post


    public function delete($id){


        $post=Post::find($id);

        if(!$post){
            return $this->returnError('404',('this post not found'));
        }else{
            $post->delete();
            return $this->returnSuccessMessage('this post deleted Successfully');
        }

    }


    }



