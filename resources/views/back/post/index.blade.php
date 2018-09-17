@extends('layouts.master')

@section('content')

    <a class="btn btn-info mt-3 mb-3" href="{{route('post.create')}}">Ajouter un post</a>

    <table class="table">
        <thead>
        <tr>
            <th>Titre</th>
                    <th>Type de post</th>
                    <th>Date de publication</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Prix</th>
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
                        <td>{{$post->start_date}}</td>
                        <td>{{$post->end_date}}</td>
                        <td>{{$post->price}}</td>
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
                            <a href="{{route('post.edit', $post->id)}}"><i class="far fa-edit">edit</i></a>
                        </td>
                        <td>
                            {{-- <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}"> DELETE
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form> --}}
                            
                        </td>
                        <td>
                            <input type="checkbox" name="ids[]" value="{{$post->id}}">
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