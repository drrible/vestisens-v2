<head>

    @include('frontend._partials.meta')

    @stack('css-before-app')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    @stack('css-after-app')

{{--    <link rel="icon" href="{{asset('images/favicon.png')}}">--}}
{{--    <link rel="icon" type="image/png" href="{{asset('images/favicon-icon-dark.png')}}" data-dark="{{asset('images/favicon-icon-light.png')}}"/>--}}




</head>
