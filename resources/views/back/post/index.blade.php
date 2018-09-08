@extends('layouts.master')

@section('content')

    <a class="btn btn-info mt-3 mb-3" href="{{route('post.create')}}">Ajouter un post</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Categorie</th>
            <th scope="col">Date de publication</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Edition</th>
            <th scope="col" class="text-center">Show</th>
            <th scope="col" class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td><a href="{{route('post.edit', ['id' =>$post->id])}}">{{$post->title}}</a></td>
                <td>
                    @if(isset($post->category->title))
                        {{ucfirst($post->category->title)}}
                    @else
                        Pas de genre
                    @endif
                </td>
                <td>{{date_format($post->created_at, 'd/m/Y à H:i:s')}}</td>
                <td class="text-center">
                    @if($post->status == "published")
                        <i class="fas fa-traffic-light fa-lg text-success"></i>
                    @else
                        <i class="fas fa-traffic-light fa-lg text-danger"></i>
                    @endif
                </td>
                <td class="text-center">
                @can('update', $post)
                        <a href="{{route('post.edit', ['id' =>$post->id])}}">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                @endcan
                @cannot('update', $post)
                    <i class="fas fa-ban fa-lg text-warning"></i>
                @endcannot
                </td>

                <td class="text-center">
                    @can('view', $post)
                        <a href="{{route('post.show', ['id' => $post->id])}}">
                            <i class="fas fa-eye fa-lg"></i>
                        </a>
                    @endcan
                    @cannot('view', $post)
                        <i class="fas fa-ban fa-lg text-warning"></i>
                    @endcannot
                </td>
                    <td class="text-center">
                        @can('delete', $post)
                            <form class="delete" action="{{route('post.destroy', ['id' => $post->id])}}" method="post">
                                @method('delete')
                                @csrf
                                <i class="deleteButton fas fa-trash fa-lg text-danger"></i>
                            </form>
                        @endcan
                        @cannot('delete', $post)
                            <i class="fas fa-ban fa-lg text-warning"></i>
                        @endcannot
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection