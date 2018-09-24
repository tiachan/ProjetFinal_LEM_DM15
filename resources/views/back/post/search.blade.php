@extends('layouts.master')

@section('content')

    <a class="btn text-white mt-3 mb-3 bg-primary" href="{{route('post.create')}}">Ajouter un post</a>
    {{$posts->links()}}

    <form class="form-inline my-2 my-lg-0 ml-3 justify-content-end"  action="{{route('backSearch')}}" method="get">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>

    <table class="table bg-light text-dark">
        <thead>
        <tr>
            <th>Titre</th>
                    <th>Type de post</th>
                    <th>Date de publication</th>
                    
                    <th>Statut</th>
                    <th>Voir</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
         @forelse($posts as $post)
                    <tr>
                        <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td>{{$post->post_type}}</td>
                        <td>{{$post->created_at}}</td>

                        <td>
                            @if($post->status == 'publié')
                            <button type="button" class="btn btn-success">publié</button>
                            @else
                            <button type="button" class="btn btn-danger">non publié</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('post.show', $post->id)}}"><span aria-hidden="true">Voir le post</span></a>
                        </td>
                        <td>
                            <a href="{{route('post.edit', $post->id)}}"><i class="far fa-edit">éditer</i></a>
                        </td>
                        <td>
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