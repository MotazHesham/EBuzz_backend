<?php

namespace App\Http\Controllers\Api\V1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\api_return;
use Validator;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\V1\User\PostResource;

class PostController extends Controller
{

    use api_return;

    //----------------------------------------view posts
    public function posts(Request $request){
        $posts = Post::where('user_id','!=',Auth::id())->where('status',1)->orderBy('created_at','desc')->paginate(10); 
        $new = PostResource::collection($posts);
        return $this->returnPaginationData($new,$posts,"success"); 
    }
    //----------------------------------------


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
            $post->photo = Storage::disk('public')->put('uploads/posts', $request->photo);

        }

        $post->save();
        return $this->returnSuccessMessage('post added Successfully');
    }

    //--------------------update post
    public function update(Request $request){

        $rules = [
            'description' => 'required',
            'city_id' => 'required|integer',
        ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return $this->returnError('401', $validator->errors());
    }

    $post=Post::find($request->post_id);
    if(!$post)

    return $this->returnError('404', "post Not Found");

    else{

    if (request()->hasFile('photo') && request('photo') != '' && request('photo') != $post->photo){
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return $this->returnError('401', $validator->errors());
        }
        $post->photo = Storage::disk('public')->put('uploads/posts', $request->photo);
        $post->save();
    }


    $post->update($request->except('photo'));
    }

    return $this->returnSuccessMessage('post Updated Successfully');
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



