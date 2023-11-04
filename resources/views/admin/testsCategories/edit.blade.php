
@extends('admin._layout.content')


@section('content')



{{Form::open([
       'route' => ['tests-categories.update', $model],
       'method' => 'put'

       ])}}


@include('admin.testsCategories.partials.form')


{{Form::close()}}










@endsection
