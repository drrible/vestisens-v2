
@extends('admin._layout.content')


@section('content')



{{Form::open([
       'route' => ['news-categories.update', $model],
       'method' => 'put'

       ])}}


@include('admin.newsCategories.partials.form')


{{Form::close()}}










@endsection
