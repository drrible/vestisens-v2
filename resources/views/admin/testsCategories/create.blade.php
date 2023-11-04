@extends('admin._layout.content')



@section('content')


    {!!Form::open([
       'route' => 'tests-categories.store',

       ]) !!}



    @include('admin.testsCategories.partials.form')

    {{Form::close()}}


@endsection
