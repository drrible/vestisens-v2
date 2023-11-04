
@extends('admin._layout.content')


@section('content')



{{Form::open([
       'route' => ['tests.update', $model],
       'method' => 'put',
  'files' => true,
       ])}}


@include('admin.tests.partials.form')


{{Form::close()}}










@endsection
