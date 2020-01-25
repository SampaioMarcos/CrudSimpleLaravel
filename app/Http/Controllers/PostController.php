<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\StoreUpdatePostRequest;

class PostController extends Controller
{
    private $post;

    public function __construct (Post $post){
        
        $this->post = $post;
    }

    public function index()
    { 
        
         $posts = $this->post->with(['comments','user'])->paginate(7);
         return view('post.index',compact('posts'));       
         
    }

    public function create()
    {      
       $id = \Auth::user()->id;
        return view('post.create',compact('id'));
         // s
    }

    public function store(StoreUpdatePostRequest $request)
    {       

         $post=$this->post->create($request->all());
        
         return redirect()->route('posts.index')->withSuccess('cadastrou');
         
    }

    public function show($id)
    {
        $post = $this->post->with(['comments.user','user'])->find($id);
        
        return view('post.show',compact('post'));
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('post.edit',compact('post'));

    }

    public function update(StoreUpdatePostRequest $request, $id)
    {
        
        $datas = $request->all();
        $target=$this->post->find($id);
        $target->update($datas);
  
        return redirect()->route('posts.index')
                        ->with('success','Product updated successfully');
        
    }

    public function destroy($id)
    {
        $target=$this->post->find($id);
        
        $destroy =$target->delete();
        
        return redirect()->route('posts.index');
    }
}
