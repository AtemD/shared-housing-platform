<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        @guest
        <a class="navbar-brand" href="{{url('/')}}">
            <span class="text-primary text-capitalize"><b>SHUMA</b></span>
        </a>
        @else
            @if(auth()->user()->getAttributes()['type'] == \App\References\UserType::LISTER)
            <a class="navbar-brand" href="{{ route('lister.home') }}">
                <span class="text-primary text-capitalize"><b>SHUMA</b></span>
            </a>
            @elseif(auth()->user()->getAttributes()['type'] == \App\References\UserType::SEARCHER)
            <a class="navbar-brand" href="{{ route('searcher.home') }}">
                <span class="text-primary text-capitalize"><b>SHUMA</b></span>
            </a>
            @endif
        @endguest

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

                    @if(auth()->user()->getAttributes()['type'] == \App\References\UserType::LISTER)
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-item" href="#">
                            <i class="nav-icon fas fa-heart mr-2"></i>{{ __('Favorites') }}
                        </a>
                        <a class="dropdown-item nav-item" href="#">
                            <i class=" nav-icon fas fa-comments mr-1"></i>{{ __('Messages') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('lister.place-requests.received.index') }}">
                            <i class="fas fa-paper-plane mr-1"></i> {{ __('Requests') }}
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-percent mr-2"></i> {{ __('Matches') }}
                        </a>

                        <a id="navbarNested" class="dropdown-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs"></i> {{ __('Account Settings') }}
                        </a>

                        <div class="dropdown-menu dropright" aria-labelledby="navbarNested">
                            <a href="{{ route('lister.basic-profile.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Basic Profile</a>
                            <a href="{{ route('lister.places.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Places</a>
                            <a href="{{ route('lister.personal-preferences.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Personal Preferences</a>
                            <a href="{{ route('lister.compatibility-preferences.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Compatibility Preferences</a>
                            <a href="{{ route('lister.interests.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Interests</a>
                            <a href="{{ route('lister.user-locations.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Location</a>
                            <a href="{{ route('lister.compatibility-questions.unanswered.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Compatibility Questions</a>
                        </div>

                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @elseif(auth()->user()->getAttributes()['type'] == \App\References\UserType::SEARCHER)
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-item" href="#">
                            <i class="nav-icon fas fa-heart mr-2"></i>{{ __('Favorites') }}
                        </a>
                        <a class="dropdown-item nav-item" href="#">
                            <i class=" nav-icon fas fa-comments mr-1"></i>{{ __('Messages') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('searcher.place-requests.received.index') }}">
                            <i class="fas fa-paper-plane mr-1"></i> {{ __('Requests') }}
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-percent mr-2"></i> {{ __('Matches') }}
                        </a>

                        <a id="navbarNested" class="dropdown-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs"></i> {{ __('Account Settings') }}
                        </a>

                        <div class="dropdown-menu dropright" aria-labelledby="navbarNested">
                            <a href="{{ route('searcher.basic-profile.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Basic Profile</a>
                            <a href="{{ route('searcher.place-preferences.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Place Preferences</a>
                            <a href="{{ route('searcher.personal-preferences.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Personal Preferences</a>
                            <a href="{{ route('searcher.compatibility-preferences.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Compatibility Preferences</a>
                            <a href="{{ route('searcher.interests.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Interests</a>
                            <a href="{{ route('searcher.user-locations.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Location</a>
                            <a href="{{ route('searcher.compatibility-questions.unanswered.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Compatibility Questions</a>
                        </div>

                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endif
                </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>