        <!-- Topbar -->
        @guest
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item header-link">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
          </ul>
        </nav>

        @else
        
        <div>
        <user-navbar/>
        </div>


        @endguest