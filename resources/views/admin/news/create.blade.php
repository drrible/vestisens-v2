@extends('admin._layout.content')



@section('content')



    {!!Form::open([
       'route' => 'news.store',
 'files' => true
       ]) !!}



    @include('admin.news.partials.form')

    {{Form::close()}}





@endsection
