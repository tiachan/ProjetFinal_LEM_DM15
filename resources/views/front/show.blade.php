@extends('layouts.master')

@section('content')
<article class="row">
    <div class="col-md-12">
    @if($post)
    <h1>{{$post->title}} - {{$post->post_types}}</h1>

    <h2>Description :</h2>
    {{$post->description}}    
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