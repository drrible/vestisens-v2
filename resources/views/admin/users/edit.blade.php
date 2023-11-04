
@extends('admin._layout.content')





@section('content')








{{Form::open([
       'route' => ['users.update', $user],
       'files' => true,
       'method' => 'put'

       ])}}





@include('admin.users.partials.form')


{{Form::close()}}










@endsection
