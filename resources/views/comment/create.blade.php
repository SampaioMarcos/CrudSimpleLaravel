<form action="{{ route('comments.store') }}" method="post" class=" mt-2">
	@csrf
	
    <input type="hidden" name="post_id"value="{{ $post->id }}">

    <div class="form-group">
        <textarea name="body" id="" cols="30" rows="4" class="form-control"></textarea>

        <div class="form-group"><button class="btn btn-primary px-5 mt-2 btn-sm">
            <strong>Comentar</strong></button></div>
    </div>
   
</form>

		<h3 class="mt-2">Comentarios ({{$post->comments->count()}})</h3>

		@forelse ($post->comments as $comment)
			<div class="list-group">				
				<li class="list-group-item mt-1">
					<p><strong> {{$comment->user->name}} </strong></p>
					<div>  {{$comment->body}}  </div>					
				</li>
			</div>

		@empty

		@endforelse