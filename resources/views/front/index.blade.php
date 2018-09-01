@extends('layouts.master')

@section('content')
<h1>Tous les posts</h1>
{{$posts->links()}}
<ul class="list-group">
@forelse ($posts as $post)
<li class="list-group-item">
	<img class="card-img-top" src="{{url('images', $post->picture->link)}}" style="width: 250px;" alt="Card image cap">
<h2><a href="{{url('post', $post->id)}}">{{$post->title}}</a></h2>
<div class="row">

<div class="col-xs-6 col-md-8">
{{$post->description}}
</div>
</div>

@empty
<li>Désolé pour l'instant aucun post n'est publié sur le site</li>
@endforelse
</ul>
{{$posts->links()}}
@endsection