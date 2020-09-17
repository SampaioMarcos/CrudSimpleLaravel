@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif

    @if (isset($post))
        <form action="{{ route('posts.update',$post->id) }}" method="post">
        {{-- {!! method_field('PUT') !!} --}}
        @method('PUT')
    @else
        <form action="{{ route('posts.store') }}" method="post">
    @endif

        @csrf
        <input type="hidden" name="user_id"value="{{$id ?? $post->user->id}}">

        <div class="form-group">
            <label for="">Título</label>
            <input type="text" class="form-control" name="title" value="{{$post->title ?? old('title')}}">
        </div>

        <div class="form-group">
        	<label>
        		Comentarios
        	</label>
            <textarea name="body" id="" cols="30" rows="5" class="form-control">
                {{$post->body ?? old('body')}}
            </textarea>
        </div>

        @if (isset($post))
            <div class="form-group"><button class="btn btn-primary px-4"><strong>Atualizar</strong></button></div>
        @else
            <div class="form-group"><button class="btn btn-primary px-4"><strong>Cadastrar</strong></button></div>
        @endif

    </form>
@endsection





