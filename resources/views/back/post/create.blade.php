@extends('layouts.master')

@section('content')
        <div class="row">
            <h2>Création d'un nouveau post</h2>
        </div>
        <div class="row">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
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
                                <input type="radio" class="form-check-input" name="status" id="status" value="1" {{old('status') == 1 ? "checked" : ""}}>
                                Publié
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="status" value="0" {{old('status') == 0 ? "checked" : ""}}>
                                Dépublié
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <h2>Uploader un fichier... mais pourquoi ?</h2>
                        <input class="form-control-file" type="file" name="picture">
                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-success" type="submit">Valider le formulaire</button>
                </div>


            </form>
        </div>


@endsection