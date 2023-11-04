<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


{{--    заменить на npm-modules--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="{{ mix('admin-assets/css/app.css') }}">
    <title>Админ панель</title>



</head>



<body>


<header>


    <section class="admin-navbar mb-2">


        <div class="container">
            <nav class="navbar navbar-expand-lg    p-1">
                <div class="container-fluid">
                    <a class="logo navbar-brand text-white" href="{{route('admin.dashboard')}}" >Админ панель</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto ">
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link mx-2 {{ Route::is('admin.dashboard') ? 'active' : '' }}"--}}
{{--                                   href="{{route('admin.dashboard')}}">Панель</a>--}}
{{--                            </li>--}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  {{ Route::is('news.*') || Route::is('news.*') ? 'active' : '' }}"

                                   href="#" id="tasksDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Новости
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="tasksDropdown">
                                    <li><a class="dropdown-item" href="{{route('news.index')}}">Все</a></li>
                                    <li><a class="dropdown-item" href="{{route('news.create')}}">Добавить новость</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{route('news-categories.index')}}">Категории</a></li>

                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ Route::is('users.*') ? 'active' : '' }}"
                                   href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Пользователи
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('users.index')}}">Все</a></li>
                                    <li><a class="dropdown-item" href="{{route('users.create')}}">Добавить Пользователя</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ Route::is('test.*')  ? 'active' : '' }}"
                                   href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Тесты
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('tests.index')}}">Все</a></li>
                                    <li><a class="dropdown-item" href="{{route('tests.create')}}">Добавить тест</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{route('tests-categories.index')}}">Категории</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link  {{ Route::is('passed.testings.*') ? 'active' : '' }}"
                                   href="{{route('passed.testings')}}"
                                  >
                                    Пройденные тесты
                                </a>

                            </li>

                        </ul>
                        <ul class="navbar-nav ms-auto cabinet">

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle"
                                   href="#" role="button" aria-haspopup="true"
                                   data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-door-open">
                                    </i> </a>
                                <div class="dropdown-menu">

                                    <a class="dropdown-item" href="/"> На главную страницу</a>
                                    <a class="dropdown-item" href="/logout">Выйти</a>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>
        </div>



{{--        ///old--}}


        <nav class="navbar  navbar-expand-lg p-0">


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}

{{--                <ul class=" navbar-nav mr-auto ml-auto">--}}


{{--                    <li class="nav-item {{ Request::is('admin.dashboard') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link " href="{{route('admin.dashboard')}}">--}}
{{--                            <i class="fas fa-university"></i>--}}
{{--                            Панель--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item {{ Request::is('pages') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link " href="{{route('users.index')}}">--}}
{{--                            <i class="fas fa-scroll"></i>--}}
{{--                            Сотрудники--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item dropdown {{ Request::is('*licentiates*') ? 'active' : '' }}">--}}

{{--                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-list-ul mr-1"></i>Лиценциат</a>--}}
{{--                        <ul class="dropdown-menu ">--}}


{{--                            <li class="drop-hover"> <a class="dropdown-item " href="{{route('licentiates.index')}}">Все заявления</a>--}}
{{--                                <a class="submenu" href="{{route('licentiates.create')}}"><i class="fas fa-plus mr-2"></i>Новое Заявление</a>--}}

{{--                            </li>--}}
{{--                            <li>  <a class="dropdown-item" href="{{route('lspecs.index')}}">Специальности</a></li>--}}

{{--                            <li>--}}
{{--                                <a class="dropdown-item bg-success text-white" href="{{route('createLBase')}}"><i class="fas fa-file-excel"></i> Экспортировать Базу</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}

{{--                    </li>--}}

{{--                    <li class="nav-item dropdown  {{ Request::is('*masterat*') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-list mr-1"></i>Мастерат</a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                                    <li class="drop-hover">--}}
{{--                                        <a class="dropdown-item" href="{{route('masterat.index')}}">Все заявления</a>--}}
{{--                                        <a class="submenu" href="{{route('masterat.create')}}"><i class="fas fa-plus mr-2"></i>Новое Заявление</a>--}}

{{--                                    </li>--}}

{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="{{route('mspecs.index')}}">Специализации</a>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                <a class="dropdown-item bg-success text-white" href="{{route('createMBase')}}"><i class="fas fa-file-excel"></i> Экспортировать Базу</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item  {{ Request::is('*questions*') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link" href="{{route('questions.index')}}">--}}
{{--                            <i class="fas  fa-question-circle mr-1"></i>--}}
{{--                            Вопросы--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item  {{ Request::is('*users*') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link" href="{{route('users.index')}}">--}}
{{--                            <i class="fas fa-users mr-1"></i>--}}
{{--                            Студенты--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                </ul>--}}


{{--            </div>--}}
        </nav>

    </section>


    <section class="error ">

            <div class="text-center">
                @if ($errors->any())
                    <div class=" mt-2">
                        <div class="row justify-content-center">
                            <div class="col-md-4">

                                <div class="alert alert-danger flash-message">
                                    <a class="close" data-dismiss="alert" href="#">×</a>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>



    </section>



</header>
