<header class="header">

    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand header-logo" href="{{ url('/') }}">
                {{--                <img src="{{asset('images/logo.svg')}}" alt="">--}}
                @include('frontend._partials.logo')
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu me-auto">
                    <li>
                        <a href="{{route('newsMain')}}" class="{{ Route::is('newsMain') ? 'active' : '' }}">Новости</a>
                    </li>
                    <li><a href="{{route('studyBlock')}}" class="">Обучающий блок</a></li>
                    <li><a href="{{ route('meditation') }}" class="">Медитация</a></li>
                                        <li><a href="{{route('contacts')}}" class="">Контакты</a>
                    {{--                    </li>--}}
                    <li><a href="{{route('aboutUs')}}" class="">O нас</a></li>


                </ul>
            </div>

            <div class="navbar-profile d-flex">
                <ul class="navbar-nav nav-profile ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item ml-0">
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ml-1">
                                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >
                                {{ Auth::user()->fullname }}

                            </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('profile')}}">
                                    Профиль
                                </a>
                                <a class="dropdown-item" href="{{route('profile.tests')}}">
                                    Пройденные тесты
                                </a>
                                @if(Auth::user()->role === 2)
                                    <a class="dropdown-item" href="/admin">
                                        Админ панель
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </div>
    </nav>
</header>

@if(auth()->user())
    <div class="menu-for-auth">

        {{--        @if(auth()->user())--}}
        {{--            <br>--}}
        {{--            Вы авторизованы--}}
        {{--            @if(auth()->user()->role === 2)--}}
        {{--                <br>--}}
        {{--                <a class="link link-primary" href="/admin"> Перейти в Админку</a>--}}
        {{--            @endif--}}
        {{--        @endif--}}

        <ul>
            <li><a href="{{ route('testing') }}" class="">Тесты</a></li>

            <li><a href="{{ route('games') }}" class="">Игровые тренажёры</a></li>

            {{--            <li><a href="#" class="">Приложения – конструкторы</a></li>--}}
            <li><a href="{{ route('motivation') }}" class="">Видео-аудио мотиваторы</a></li>


        </ul>
    </div>
@endif
