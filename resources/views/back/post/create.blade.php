@extends('layouts.master')

@section('content')
        <div class="row">
            <h2>Création d'un nouveau post</h2>
        </div>
        <div class="row">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Titre: </label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Titre du post" value="{{old('title')}}">
                        @if($errors->has('title'))
                            <div class="alert alert-danger mt-1">{{$errors->first('title')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">Description: </label>
                        <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                            <div class="alert alert-danger mt-1">{{$errors->first('description')}}</div>
                        @endif
                    </div>

                      <div class="form-group">
                        <label for="start_date">Date de début :</label>
                        <input type="date" name="start_date" value="{{old('start_date')}}" class="form-control" id="start_date">
                        @if($errors->has('start_date'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('start_date')}}</span>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="end_date">Date de fin :</label>
                        <input type="date" name="end_date" value="{{old('end_date')}}" class="form-control" id="end_date">
                        @if($errors->has('end_date'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('end_date')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="3,4"></input>
                        @if($errors->has('price'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('price')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nb_max">Nombre d'élèves maximum :</label>
                        <input type="text" name="nb_max" value="{{old('nb_max')}}" class="form-control" placeholder="400"></input>
                        @if($errors->has('nb_max'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('nb_max')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="post_type">type de post :</label>
                        <select name="post_type" id="post_type">
                            <option value="undetermined" {{ old('post_type') == "" ? 'selected' : '' }}></option>
                            <option value="stage" {{ old('post_type') == "stage" ? 'selected' : '' }}>Stage</option>
                            <option value="formation" {{ old('post_type') == "formation" ? 'selected' : '' }}>Formation</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="genre">Catégorie: </label>
                        <select class="form-control" name="genre_id" id="genre">
                            <option value="0">Pas de genre</option>
                            @forelse($categories as $id => $category)
                                <option value="{{$id}}" {{old('category_id') == $id ? "selected" : ""}}>{{ucfirst($category)}}</option>
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
                                <input type="radio" class="form-check-input" name="status" id="status" value="publié" {{old('status') == 1 ? "checked" : ""}}>
                                Publié
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="status" value="non publié" {{old('status') == 0 ? "checked" : ""}}>
                                Non publié
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <h2>Uploader un fichier... mais pourquoi ?</h2>
                        <input class="form-control-file" type="file" name="picture">
                    </div>
                </div>


                    <button class="btn btn-success" type="submit">Valider le formulaire</button>


            </form>
        </div>


@endsection