@extends('layouts.master')

@section('content')

    <div class="row mt-5">
        <div class="col">
            <h2>{{$post->title}}</h2>
            <p>
                <strong>Genre: </strong> {{$post->category->title}}
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
        <div class="col">
            <h2>Image de couverture</h2>
            @if(is_object($post->picture))
                <img src="{{asset('images/' . $post->picture->link)}}" alt="">
            @else
                <img src="" alt="Pas d'image">
            @endif
        </div>

    </div>


@endsection