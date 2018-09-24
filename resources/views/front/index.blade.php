@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-8">
				<h2>Découvrez nos derniers posts :</h2>

			<ul class="list-group justify-content-center">
				@forelse ($posts as $post)
                @if($post->status == 'publié')
				<li class="list-group-item mb-4">
					@if(is_null($post->picture) == false)
					<img class="card-img" src="{{url('images', $post->picture->link)}}" style="max-width: 250px;" alt="Card image cap">
					@endif
					<h2><a href="{{url('post', $post->id)}}">{{$post->title}}</a></h2>
					<div class="row">
						<div class="col-xs-6 col-md-8">
							{{$post->description}}
							<br>
							{{$post->category}}
						</div>
					</div>
				</li>
				@endif

				@empty
				<li>Désolé pour l'instant aucun post n'est publié sur le site</li>
				@endforelse
			</ul>
		</div>
		<div class="list-group col-4 bg-light pt-5 mt-5 mb-4">
			<form class="form-inline my-2 my-lg-0 ml-3"  action="{{route('search')}}" method="get">
							<h4>Vous pouvez également chercher d'autres posts ici :</h4>

				<input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</div>
</div>
@endsection