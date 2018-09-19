<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-end">
    <div class="font-weight-bold text-left text-white bg-dark pl-4 pr-3">FormaStage</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon justify-content-end"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/post/stage')}}">Stages</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/post/formation')}}">Formations</a></li>
            <li class="nav-item">
                <a class="nav-link" class="nav-item" href="/contact">Contact</a>
            </li>
            {{-- renvoie true si vous êtes connecté --}}
            @if(Auth::check())
            <li class="nav-item"><a class="nav-link" href="{{route('post.index')}}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @else
        <li class="nav-item"><a class="nav-link text-success" href="{{route('login')}}">Login</a></li>
        @endif
    </div>
</ul>
<div class="container-fluid">
</div>
</nav>