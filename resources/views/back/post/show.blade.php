@extends('layouts.master')

@section('content')

        <div class="col">
            <h2>Image de couverture</h2>
            @if(is_object($post->picture))
                <img src="{{asset('images/' . $post->picture->link)}}" alt="">
            @else
                <img src="" alt="Pas d'image">
            @endif
        </div>

    <div class="row mt-5">
        <div class="col">
            <h2>{{$post->title}}</h2>
            <p>
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
                <strong>Status: </strong> TODO
            </p>

        </div>


    </div>


@endsection