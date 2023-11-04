@extends('admin._layout.content')



@section('content')



    {!!Form::open([
       'route' => 'users.store',
       'files' => true
       ]) !!}



    @include('admin.users.partials.form')

    {{Form::close()}}





@endsection
