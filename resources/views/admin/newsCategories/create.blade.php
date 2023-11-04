@extends('admin._layout.content')



@section('content')



    {!!Form::open([
       'route' => 'news-categories.store',

       ]) !!}



    @include('admin.newsCategories.partials.form')

    {{Form::close()}}




@endsection
