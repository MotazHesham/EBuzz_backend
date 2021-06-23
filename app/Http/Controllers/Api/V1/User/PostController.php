<?php

namespace App\Http\Controllers\Api\V1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\api_return;


class PostController extends Controller
{

    use api_return;




    //delete post


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



