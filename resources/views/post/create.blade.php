@extends('layouts.app')

@section('content')
  {{--       
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 --}}
 {{-- @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif --}}

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('posts.store') }}" method="post">       
        @csrf
        <input type="hidden" name="user_id"value="{{ $id }}">
        <div class="form-group">
            <label for="">Título</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
        	<label>
        		Comentarios
        	</label>
            <textarea name="body" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group"><button class="btn btn-primary px-4"><strong>Cadastrar</strong></button></div>
    </form>
@endsection





