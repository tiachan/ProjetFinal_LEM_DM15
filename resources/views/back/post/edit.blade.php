@extends('layouts.master')

@section('content')
    <div class="row mt-2">
        <h2>Edition du livre: {{$post->title}}</h2>
    </div>

    <div class="row">
        <form action="{{route('post.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf

            <div class="col-6">
                <div class="form-group">
                    <label for="title">Titre: </label>
                    <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
                    @if($errors->has('title'))
                        <div class="alert alert-danger mt-1">{{$errors->first('title')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea class="form-control" name="description" id="description">{{$post->description}}</textarea>
                    @if($errors->has('description'))
                        <div class="alert alert-danger mt-1">{{$errors->first('description')}}</div>
                    @endif
                </div>

                                    <div class="form-group">
                        <label for="start_date">Date de début :</label>
                        <input type="date" name="start_date" value="{{$post->start_date}}" class="form-control" id="start_date">
                        @if($errors->has('start_date'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('start_date')}}</span>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="end_date">Date de fin :</label>
                        <input type="date" name="end_date" value="{{$post->end_date}}" class="form-control" id="end_date">
                        @if($errors->has('end_date'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('end_date')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" value="{{$post->price}}" class="form-control" placeholder="3,4"></input>
                        @if($errors->has('price'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('price')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nb_max">Nombre d'élèves maximum :</label>
                        <input type="text" name="nb_max" value="{{$post->nb_max}}" class="form-control" placeholder="400"></input>
                        @if($errors->has('nb_max'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('nb_max')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="post_type">type de post :</label>
                        <select name="post_type" id="post_type">
                            <option value="undetermined" {{ $post->post_type == "" ? 'selected' : '' }}></option>
                            <option value="stage" {{ $post->post_type == "stage" ? 'selected' : '' }}>Stage</option>
                            <option value="formation" {{ $post->post_type == "formation" ? 'selected' : '' }}>Formation</option>
                        </select>
                    </div>

                <div class="form-group">
                    <label for="category">Catégorie: </label>
                    <select class="form-control" name="category_id" id="category">
                        <option value="0">Pas de catégorie</option>
                        @forelse($categories as $id => $category)
                            <option value="{{$id}}" {{old('category_id') == $id ? "selected" : ""}}>{{ucfirst($category->name)}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>


            </div>
            <div class="col-6">
                <div class="form-group">
                    <h2>Status</h2>
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
                    <h2>Couverture du livre</h2>
                    <input class="form-control-file" type="file" name="picture">
                    @if($post->picture)
                        <div class="mt-3">
                            <p class="alert alert-info">Image actuelle</p>
                            <img src="{{asset('images/' . $post->picture->link)}}" alt="">
                        </div>
                    @endif
                </div>
            </div>

                    

            <div class="form-group">
                <button class="btn btn-success" type="submit">Valider le formulaire</button>
            </div>
            </form>
    </div>

    </form>
@endsection