@extends('admin._layout.content')



@section('content')

    <div id="wrapper">
        <div class="dash-content ">
            <div class="container">

                <div class="row pt-5 ">
                    <div class="col-md-12">
                        <div class=" mt-3">

                            <h2 class=" d-inline-block mb-3 mr-2">{{$title_list}}</h2>
                            <a href="{{route('users.create')}}" class="btn add-btn d-inline bg-green "><i
                                    class="fas  fa-plus mr-2"></i>{{$title_add}}</a>

                        </div>
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped ">
                                <thead class="">
                                <tr>
                                    <th class="table-id">ID</th>
                                    <th>Имя фамилия</th>
                                    <th>Емайл</th>
                                    <th>Роль</th>
                                    <th>Протестирвано</th>
                                    <th class="w-5 text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($users as $user)

                                    <tr>
                                        <td class="table-id">{{$user->id}}</td>
                                        <td>{{$user->fullname}}</td>
                                        <td>{{$user->email}}</td>

                                        @if(isset($user->role))
                                            <td>{{$user->role == 1 ? 'Базовый' : 'Админ' }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td><a class="btn btn-primary fw-bolder" href="{{route('users.testing.info', $user->id)}}">{{$user->testingUser->count()}} тестов</a></td>

                                        <td class="text-center">

                                            <a href="{{route($route_edit, $user->id)}}" class="btn table-btn bg-yellow"
                                               data-toggle="tooltip" data-placement="bottom" title="Редактировать"><i
                                                    class="fas fa-pen"></i></a>
                                            {{Form::open(['route'=>[$route_remove, $user->id], 'method'=>'delete'])}}
                                            <button href="#" type="submit"
                                                    onclick="return confirm('Вы уверены что хотите удалить ?')"
                                                    class="btn table-btn bg-red "
                                                    data-toggle="tooltip"
                                                    data-placement="bottom"
                                                    title="Удалить ?">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {{Form::close()}}
                                        </td>


                                    </tr>

                                @endforeach

                                @if (count($users)<1)
                                    <tr>

                                        <td class="text-center f-18" colspan="7">Список пуст</td>

                                    </tr>
                                @endif


                                </tbody>
                            </table>


                        </div>

                    </div>
                    <div class="mar-center pt-4">
                        {{$users->links()}}
                    </div>


                </div>
            </div>


        </div>
    </div>

@endsection
