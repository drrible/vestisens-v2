<?php
@extends('frontend._layouts.app')
@section('body_class', 'page-500')

@section('content')

<div class="section-def section-errors">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>500</h1>
                <h3 class="mb-2">Внутренняя ошибка сервера</h3>
                <p class="mb-2 p-0">
                    Произошла внутренняя ошибка. Попробуйте обновить страницу или вернитесь позже.
                </p>

                <div class="text-center">
                    <a href="/" class="btn btn-big btn-reg">Главная страница</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection