<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('frontend._partials.head')

<body class="@yield('body_class')">

@include('frontend._partials.header')
<main>

    @yield('content')

</main>

@include('frontend._partials.footer')

@stack('js-before-app')


<script src="{{ mix('js/app.js') }}"></script>
@stack('js-after-app')
</body>
</html>
