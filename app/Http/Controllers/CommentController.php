<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Comment;

class CommentController extends Controller
{

        public function store(Request $request)
    {  
         $comment = $request->user()->comments()->create($request->all());
               
         return redirect()->route('posts.show',$comment->post_id);
         
    }
}
