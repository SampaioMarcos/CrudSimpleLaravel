<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StoreUpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;

    public function __construct (Post $post){

        $this->post = $post;
    }

    public function index()
    {
         try {

            $posts = $this->post->with(['comments','user'])->paginate(7);
            return view('post.index',compact('posts'));

         } catch (\Exception $e) {
            return redirect()->back();
         }
    }

    public function create()
    {
       $id = Auth::user()->id;
       return view('post.create-edit',compact('id'));

    }

    public function store(StoreUpdatePostRequest $request)
    {
         try {

            $this->post->create($request->all());

            return redirect()->route('posts.index')->with('success','Cadastrado');

         } catch (\Exception $e) {
            return redirect()->back();
         }

    }

    public function show($id)
    {
        try {

            $post = $this->post->with(['comments.user','user'])->find($id);
            return view('post.show',compact('post'));

         } catch (\Exception $e) {
            return redirect()->back();
         }
    }

    public function edit($id)
    {
        try {

            $post = $this->post->find($id);
            return view('post.create-edit',compact('post'));

         } catch (\Exception $e) {
            return redirect()->back();
         }

    }

    public function update(StoreUpdatePostRequest $request, $id)
    {
        try {

            $datas = $request->all();
            $target=$this->post->find($id);
            $target->update($datas);
            return redirect()->route('posts.index');

        } catch (\Exception $e) {
            return redirect()->back();
         }
    }

    public function destroy($id)
    {
        try {
            $target=$this->post->find($id);
            $destroy =$target->delete();
            return redirect()->route('posts.index')->with('danger','Post apagado com sucesso');

        } catch (\Exception $e) {
            return redirect()->back();
         }
    }
}
