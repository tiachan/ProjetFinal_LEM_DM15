<nav class="navbar navbar-inverse navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header ">
          
            <a class="navbar-brand" href="/">{{config('app.name')}}</a>
        </div>
        <div class="navbar-expand-lg" id="myNavbar">
             <ul class="navbar-nav text-uppercase ml-auto">
            <li class="active"><a href="{{url('/')}}">Accueil</a></li>
            <li class="nav-item"><a href="{{url('/post/stage')}}">Stages</a></li>
            <li class="nav-item"><a href="{{url('/post/formation')}}">Formations</a></li>
            <li class="nav-item">
              <a class="nav-item" href="/contact">Contact</a>
            </li>
          </ul>
        </div>
    </div>
</nav>