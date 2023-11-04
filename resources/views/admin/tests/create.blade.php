@extends('admin._layout.content')



@section('content')



    {!!Form::open([
       'route' => 'tests.store',
 'files' => true
       ]) !!}



    @include('admin.tests.partials.form')

    {{Form::close()}}





@endsection
