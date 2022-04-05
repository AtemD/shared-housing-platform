<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <span class="text-primary text-capitalize"><b>1234</b></span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->full_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-item" href="#">
                            <i class="nav-icon fas fa-heart mr-2"></i>{{ __('Favorites') }}
                        </a>
                        <a class="dropdown-item nav-item" href="#">
                            <i class=" nav-icon fas fa-comments mr-1"></i>{{ __('Messages') }}
                        </a>

                        <a class="dropdown-item" href="#">
                            <i class="fas fa-question-circle mr-1"></i> {{ __('Requests') }}
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-percent mr-2"></i> {{ __('Matches') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('user.account-settings.index') }}">
                            <i class="fas fa-cogs"></i> {{ __('Account Settings') }}
                        </a>
                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>