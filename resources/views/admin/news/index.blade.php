@extends('admin._layout.content')



@section('content')

    <div id="wrapper">
        <div class="dash-content ">
            <div class="container">

                <div class="row pt-5 ">
                    <div class="col-md-12">
                        <div class=" mt-3">

                            <h2 class=" d-inline-block mb-3 mr-2">{{$title_list}}</h2>
                            <a href="{{route($route_add)}}" class="btn add-btn d-inline bg-green "><i
                                    class="fas  fa-plus mr-2"></i>{{$title_add}}</a>

                        </div>
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped ">
                                <thead class="">
                                <tr>
                                    <th class="table-id">ID</th>
                                    <th>Наименование</th>
                                    <th>Категория</th>
                                    <th>Которкий текст</th>
                                    <th>Состояние</th>
                                    <th>Дата публикации</th>

                                    <th class="w-5 text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($model as $item)

                                    <style>
                                        .text-over{
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            word-break: break-all;
                                            max-width: 300px;
                                        }
                                    </style>

                                    <tr>
                                        <td class="table-id">{{$item->id}}</td>
                                        <td class="text-over">{{$item->title}}</td>
                                        <td>{{!is_null($item->category) ? $item->category->title : 'не указана' }}</td>
                                        <td class="text-over" >{{$item->text_short}}</td>
                                        <td>{{$item->show  === 1 ? 'отображается' : 'скрыто'}}</td>
                                        <td>{{$item->getFrontDate($item->pub_date) }} </td>


                                        <td class="text-center">
                                            <a href="{{route($route_edit, $item->id)}}" class="btn table-btn bg-yellow"
                                               data-toggle="tooltip" data-placement="bottom" title="Редактировать"><i
                                                    class="fas fa-pen"></i></a>
                                            {{Form::open(['route'=>[$route_remove, $item->id], 'method'=>'delete'])}}
                                            <button href="#" type="submit"  onclick="return confirm('Вы уверены что хотите удалить  ?')" class="btn table-btn bg-red "  data-toggle="tooltip" data-placement="bottom" title="Удалить ?"  ><i class="fas fa-trash" ></i></button>
                                            {{Form::close()}}


                                        </td>

                                    </tr>

                                @endforeach

                                @if (count($model)<1)
                                    <tr>
                                        <td class="text-center f-18" colspan="7">Список пуст</td>
                                    </tr>
                                @endif


                                </tbody>
                            </table>


                        </div>

                    </div>
                    <div class="mar-center pt-4">
                        {{$model->links()}}
                    </div>


                </div>
            </div>


        </div>
    </div>


@endsection
