<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">


        <div class="main-header-left ">
            <div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
            </div>

        </div>
        <div class="main-header-center">

        </div>
        <div class="main-header-right">
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="row">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <a class="col-sm dropdown-item" href="#">&nbsp {{ Auth::user()->username }}</a>

                        <a class="col-sm dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">&nbsp Выйти</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
