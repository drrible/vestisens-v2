@section('body_class', 'page-404')

@extends('frontend._layouts.app')

@section('content')

<div class="section-def section-errors">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">

{{--                <div class="img-404 m-auto">--}}
{{--                    <img src="{{asset('images/404.png')}}" alt="">--}}
{{--                </div>--}}
                <h1>404</h1>
                <h3 class="mb-2">Страница не найдена</h3>
                <p class="mb-2 p-0">
                    Неправильно набран адрес, или такой страницы на сайте больше не существует.
                </p>

                <div class="text-center">
                    <a href="/" class="btn btn-big btn-reg">Главная страница</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection


