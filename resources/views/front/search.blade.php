@extends('layouts.master')

@section('content')
<h1>Résultat de la recherche</h1>
{{$posts->links()}}
<ul class="list-group">
@forelse ($posts as $post)
@if($post->status == 'publié')

<li class="list-group-item mb-4">
	            @if(is_null($post->picture) == false)
	<img class="card-img-top" src="{{url('images', $post->picture->link)}}" style="width: 250px;" alt="Card image cap">
	@endif
<h2><a href="{{url('post', $post->id)}}">{{$post->title}}</a></h2>
<div class="row">

<div class="col-xs-6 col-md-8">
{{$post->description}}
</div>
</div>
@endif
@empty
<li>Aucun post ne correspond à votre recherche</li>
@endforelse
</ul>
{{$posts->links()}}
 
@endsection