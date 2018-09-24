@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
    <a class="btn text-white mt-3 mb-3 bg-primary" href="{{route('post.create')}}">Ajouter un post</a>
</div>
<div class="col">
    <form class="form-inline justify-content-end mt-3 mb-3"  action="{{route('backSearch')}}" method="get">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
</div>
</div>
</div>
    {{$posts->links()}}

    <table class="table bg-light text-dark">
        <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Type de post</th>
            <th scope="col">Date de publication</th>
            
            <th scope="col">Statut</th>
            <th scope="col">Voir</th>
<!--             <th scope="col">Editer</th>
 -->            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
         @forelse($posts as $post)
                    <tr>
                        <td scope="row"><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td scope="row">{{$post->post_type}}</td>
                        <td scope="row">{{$post->created_at}}</td>

                        <td scope="row">
                            @if($post->status == 'publié')
                            <button type="button" class="btn btn-success">publié</button>
                            @else
                            <button type="button" class="btn btn-danger">non publié</button>
                            @endif
                        </td>
                        <td scope="row">
                            <a href="{{route('post.show', $post->id)}}"><span aria-hidden="true">Voir le post</span></a>
                        </td>
                        <!-- <td scope="row">
                            <a href="{{route('post.edit', $post->id)}}"><i class="far fa-edit">éditer</i></a>
                        </td> -->
                        <td scope="row">
                             <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}"><input type="submit" value="supprimer" class="btn btn-danger"> <i class="far fa-edit"></i>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                            
                        </td>

                    </tr>
                @empty
                    aucun post ...
                @endforelse
        </tbody>
    </table>
    {{$posts->links()}}
@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection