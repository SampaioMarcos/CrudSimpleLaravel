@extends('layouts.app')

@section('content')
    
    <form action="{{ route('posts.update',$post->id) }}" method="post">       
        @csrf
        @method('PUT') 
        <input type="hidden" name="user_id" value="{{$post->user->id}}">
        <div class="form-group">
            <label for="">Título</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>

        <div class="form-group">
        	<label>
        		Comentarios
        	</label>
            <textarea name="body" rows="5" class="form-control ml-0 pl-0">
                {{$post->body}}
            </textarea>
        </div>

        <div class="d-flex">
            {{-- <form action="{{route('posts.index')}}"class="m-2">                --}}
                <button class="btn btn-success px-5">Voltar</button>
            {{-- </form>    --}}

            {{-- <form action="{{route('posts.update',$post->id)}}" method="post" class="m-2"> --}}
                 {{-- @csrf  --}}
                 {{-- @method('PUT')  --}}
                <button type="submit" class="btn btn-primary px-5">Atualizar</button>
            {{-- </form>       --}}
        </div>

    </form>
@endsection

