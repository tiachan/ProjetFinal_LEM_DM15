@extends('layouts.master')

@section('content')
<div class="row justify-content-center">

    <div class="card mt-3 mb-3" style="width: 40em; text-align: center;">
  @if(is_object($post->picture))
                <img class="card-img" src="{{asset('images/' . $post->picture->link)}}" alt="">
            @else
                <img src="" alt="Pas d'image">
            @endif
  <div class="card-body">
    <h2>{{$post->title}}</h2>

    <p class="card-text"><p>
              @if(is_null($post->category) == false)
                <strong>Catégorie: </strong> {{$post->category->title}}
            @endif

            <h2>Description :</h2>
    {{$post->description}}  
    <br>
    {{$post->category}}
  
   <p>Dates :  {{$post->start_date}} - {{$post->end_date}}</p>
   <p>Prix : {{$post->price}} - Nombre max d'étudiants : {{$post->nb_max}}</p>

            </p>
            <p>
                <strong>Date de création: </strong> {{$post->created_at}}
            </p>
            <p>
                <strong>Date de mise à jour: </strong> {{$post->updated_at}}
            </p>
            <p>
                <strong>Status: </strong> {{$post->status}}
            </p></p>
  </div>
</div>
</div>



@endsection