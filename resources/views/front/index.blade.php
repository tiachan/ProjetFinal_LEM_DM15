@extends('layouts.master')

@section('content')
<h1>Tous les posts</h1>
{{$posts->links()}}
<ul class="list-group">
@forelse ($posts as $post)
<li class="list-group-item">
	            @if(is_null($post->picture) == false)
	<img class="card-img-top" src="{{url('images', $post->picture->link)}}" style="width: 250px;" alt="Card image cap">
	@endif
<h2><a href="{{url('post', $post->id)}}">{{$post->title}}</a></h2>
<div class="row">

<div class="col-xs-6 col-md-8">
{{$post->description}}
<br>
{{$post->category}}

</div>
</div>

@empty
<li>Désolé pour l'instant aucun post n'est publié sur le site</li>
@endforelse
</ul>
{{$posts->links()}}
 <form class="form-inline my-2 my-lg-0"  action="{{route('search')}}" method="get">
      <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
@endsection