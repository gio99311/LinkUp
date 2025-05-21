<nav class="navbar navbar-expand-lg nav-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LinkUp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> 
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About us</a>
                </li>
            </ul>
            @guest
            <ul class="navbar-nav d-flex justify-content-end">
                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
            </ul>
            @endguest

            @auth
            <ul class="navbar-nav d-flex justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Benvenuto
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('users.show', Auth::user()->name)}}">Profilo</a></li>
                  
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Logout</a></li>
                  <form action="{{ route('logout') }}" method="POST" id="logout-form">
                      @csrf
                  </form>
                </ul>
              </li>
            </ul>
            @endauth
            
        </div>
    </div>
</nav>
