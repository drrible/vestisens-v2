
@extends('admin._layout.content')


@section('content')



{{Form::open([
       'route' => ['news.update', $model],
       'method' => 'put',
  'files' => true,
       ])}}


@include('admin.news.partials.form')


{{Form::close()}}










@endsection
