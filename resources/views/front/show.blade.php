@extends('layouts.master')

@section('content')
<article class="row">
    <div class="col-md-12">
    @if($post)
            @if(is_null($post->picture) == false)
          <img class="card-img-top" src="{{url('images', $picture->link)}}" style="width: 250px;" alt="Card image cap">
          @endif
    <h1>{{$post->title}} - {{$post->post_type}}</h1>

    <h2>Description :</h2>
    {{$post->description}}  
    <br>
    {{$post->category}}
  
   <p>Dates :  {{$post->start_date}} - {{$post->end_date}}</p>
   <p>Prix : {{$post->price}} - Nombre max d'étudiants : {{$post->nb_max}}</p>
    @else 
    <h1>Désolé aucun post</h1>
    @endif 
 </li>
    </div>
</article>

</ul>
@endsection