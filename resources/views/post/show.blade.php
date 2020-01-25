 @extends('layout.index')


@section('content')
	<div class="border mt-2">
			<h5 class="p-2">{{$post->title}}</h5> 		    

		<div class="p-2">
			{{$post->body}}
		</div>
        
        <div class="d-flex">
			<form action="{{route('posts.edit',$post->id)}}" class="m-2">
				<button type="submit" class="btn btn-success btn-sm px-5">Editar</button>
			</form>

			{{-- <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-success">Editar</a> --}}

			<form action="{{route('posts.destroy',$post->id)}}" method="post" class="m-2">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger px-5 btn-sm ">Apagar</button>
			</form>						
		</div>
	</div>

		@include('comment.create')
		
	
@endsection

