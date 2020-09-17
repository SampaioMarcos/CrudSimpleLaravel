@extends('layouts.app')

@section('content')


    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{session('danger')}}
        </div>
    @endif


    <div class="mb-2">

        <a class="btn btn-success px-5 " href="{{ route('posts.create') }}"><strong>Cadastrar</strong></a>

        @forelse ($posts as $post)

        <div class="d-flex justify-content-between align-items-center mt-3">
            <p class="px-4">{{$post->title}}</p>
            <a href="{{route('posts.show',$post->id)}}" class="px-4"> Detalhes</a>
        </div>
        <hr>
@empty

@endforelse
{!! $posts !!}
    </div>

@endsection

