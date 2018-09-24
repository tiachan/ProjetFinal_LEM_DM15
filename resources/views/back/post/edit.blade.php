@extends('layouts.master')
@section('content')
<div class="bg-light p-5 mt-3 mb-3">
    <h2><b>Edition du post :</b> {{$post->title}}</h2>
    <form action="{{route('post.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div>
            <div class="form-group">
                <h2>Titre: </h2>
                <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
                @if($errors->has('title'))
                <div class="alert alert-danger mt-1">{{$errors->first('title')}}</div>
                @endif
            </div>
            <div class="form-group">
                <h2>Description: </h2>
                <textarea class="form-control" name="description" id="description">{{$post->description}}</textarea>
                @if($errors->has('description'))
                <div class="alert alert-danger mt-1">{{$errors->first('description')}}</div>
                @endif
            </div>
            <div class="form-group">
                <h2>Date de début :</h2>
                <input type="date" name="start_date" value="{{$post->start_date}}" class="form-control" id="start_date">
                @if($errors->has('start_date'))
                <div class="alert alert-danger" role="alert">
                    <span class="error">{{$errors->first('start_date')}}</span>
                </div>
                @endif
            </div>
            <div class="form-group">
                <h2>Date de fin :</h2>
                <input type="date" name="end_date" value="{{$post->end_date}}" class="form-control" id="end_date">
                @if($errors->has('end_date'))
                <div class="alert alert-danger" role="alert">
                    <span class="error">{{$errors->first('end_date')}}</span>
                </div>
                @endif
            </div>
            <div class="form-group">
                <h2>Prix :</h2>
                <input type="text" name="price" value="{{$post->price}}" class="form-control" placeholder="3,4"></input>
                @if($errors->has('price'))
                <div class="alert alert-danger" role="alert">
                    <span class="error">{{$errors->first('price')}}</span>
                </div>
                @endif
            </div>
            <div class="form-group">
                <h2>Nombre d'élèves maximum :</h2>
                <input type="text" name="nb_max" value="{{$post->nb_max}}" class="form-control" placeholder="400"></input>
                @if($errors->has('nb_max'))
                <div class="alert alert-danger" role="alert">
                    <span class="error">{{$errors->first('nb_max')}}</span>
                </div>
                @endif
            </div>
            <div class="form-group">
                <h2>Type de post :</h2>
                <select name="post_type" id="post_type">
                    <option value="undetermined" {{ $post->post_type == "" ? 'selected' : '' }}></option>
                    <option value="stage" {{ $post->post_type == "stage" ? 'selected' : '' }}>Stage</option>
                    <option value="formation" {{ $post->post_type == "formation" ? 'selected' : '' }}>Formation</option>
                </select>
            </div>
        <!-- Catégories -->
        </div>
        <div >
            <div class="form-group">
                <h2>Statut</h2>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="status" value="1" {{$post->status == "published" ? "checked" : ""}}>
                        Publié
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="status" value="0" {{$post->status == "unpublished" ? "checked" : ""}}>
                        Dépublié
                    </label>
                </div>
            </div>
            <div class="form-group">
                <h2>Image du post</h2>
                <input class="form-control-file" type="file" name="picture">
                @if($post->picture)
                <div class="mt-3">
                    <p class="alert alert-info">Image actuelle</p>
                    <img src="{{asset('images/' . $post->picture->link)}}" alt="">
                </div>
                @endif
            </div>
        </div>
        
        <div class="form-group justify-content-center">
            <button class="btn btn-success" type="submit">Valider le formulaire</button>
        </div>
    </form>
</div>
</form>
@endsection