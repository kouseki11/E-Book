<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">WikBook</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/book"><i class="bi bi-book"></i> All Books</a></li>
              <li><hr class="dropdown-divider"></li>
              @foreach($categories as $category)
              <li><a class="dropdown-item" href="/book?category={{ $category->slug }}">{{ $category->name }}</a></li>
              @endforeach
            </ul>
          </li>       
        </ul>

        <ul class="navbar-nav">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Welcome back, {{ auth()->user()->name }}
            </a>
            @if(Auth::user()->roles === 'admin')
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard/admin"><i class="bi bi-layout-text-sidebar-reverse"></i>My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                  <a href="{{ route('logout') }}" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</a>
              </li>
            </ul>
            @else
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a href="{{ route('logout') }}" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
            </ul>
            @endif
          </li>       
          @else
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
          </li>
          @endauth
        </ul>
       
      </div>
    </div>
  </nav>