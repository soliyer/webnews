{{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" >{{config("app.name")}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="/services">Services</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled " href="#">Contact us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  " href="/posts">Blog</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right m-2">
            <li><a class="btn btn-secondary" href="/posts/create">Create Post</a></li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav> --}}


      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid p-1">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                  <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link " href="/services">Services</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link disabled " href="#">Contact us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  " href="/posts">Blog</a>
                  </li>

                </ul>
                {{-- <ul class="nav navbar-nav navbar-right m-2">
                  <li><a class="btn btn-secondary" href="/posts/create">Create Post</a></li>
                </ul> --}}

                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif


                        @if (Route::has('register'))
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>


                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/dashboard">Dashboard</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

