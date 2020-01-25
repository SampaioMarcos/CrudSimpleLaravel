@extends('layouts.app')

@section('content')
<div class="mb-4">
	
	<a class="btn btn-success px-5" href="{{ route('posts.create') }}"><strong>Cadastrar</strong></a>
</div>
{{-- 
@forelse ($posts as $post)
  <div class="list-group">
    <div class="list-group-item  mt-1">
      <p> {{$post->user->name}} - <strong>{{$post->title}}</strong></p>
      <p> <strong>Comentário</strong> : {{$post->body}}</p>
    </div>
  </div>
@empty

@endforelse --}}



@forelse ($posts as $post)

   <div class="d-flex justify-content-between align-items-center">
	
	<p class="px-4">{{$post->title}}</p>

   	<a href="{{route('posts.show',$post->id)}}" class="px-4"> Detalhes</a>
        
   </div>    
<hr>
@empty

@endforelse
{!! $posts !!}
@endsection

