@extends('frontend._layouts.app')

@section('content')

    <div class="section table">
        <div class="container">

            @if(auth()->user()->role === 2)
            <td>
                <button class="edit-table btn btn-reg"
                        style="cursor:pointer"
                        data-bs-toggle="modal"
                        data-bs-target="#createTasksModal"

                >
                    Добавить
                </button>
            </td>

            @include('frontend.pages.tasks.modal-create')

            @endif



            <div class="table-responsive">

                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>ФИО <br> исполнителя</th>
                        <th>ФИО куратора</th>
                        <th>Дата начала</th>
                        <th>Дата сдачи</th>
                        <th>Степень <br> гот.</th>
                        <th>Отметка <br> о вып.</th>
                        <th>Отметка <br> о срыве</th>
                        <th>Итог <br>коэфициент</th>
                        <th>Итог <br>текст </th>
                        <th>Итог <br>резюме</th>
                        @if(auth()->user()->role === 2)
                        <th>Действия</th>
                        @endif

                    </tr>
                    </thead>

                    <style>
                        .bg-red{
                            background-color: #a52834;
                            color: #fff;
                            padding: 2px  4px;
                        }
                    </style>


                    <tbody id="table-create" >

                    @foreach($tasks as $item)
                        <tr scope="row" class="task-row-id--{{$item->id}}">
                        <td class="task-cell--id">{{$item->id}}</td>
                        <td class="task-cell--title">{{$item->title}}</td>
                        <td class="task-cell--executor_user_id">
                            <a href="{{route('employers')}}/{{$item->executor_user_id}}" class="name">{{isset($item->executor_user_id) ? $item->getUserById($item->executor_user_id)->fullname : ''}}</a>
                        </td>
                        <td class="task-cell--curator_user_id">
                            <a href="{{route('employers')}}/{{$item->curator_user_id}}" class="name">{{isset($item->curator_user_id) ? $item->getUserById($item->curator_user_id)->fullname : ''}}</a>
                        </td>
                        <td class="task-cell--start_date">{{$item->getFrontDate($item->start_date)}}</td>
                        <td class="task-cell--end_date">{{$item->getFrontDate($item->end_date)}}</td>
                        <td class="task-cell--ready_degree"> @if(isset($item->ready_degree))<b>{{$item->ready_degree}}%</b>@endif</td>
                        <td class="task-cell--execution_mark_date">{{$item->getFrontDate($item->execution_mark_date)}}</td>
                        <td class="task-cell--failure_mark_date">@if(isset($item->failure_mark_date))<span class="bg-red">{{$item->getFrontDate($item->failure_mark_date)}}</span>@endif </td>


                            <td class="task-cell--result_mark">{{$item->result_mark}}
                                @if(isset($item->result_mark))
                                <i data-bs-toggle="popover" data-bs-placement="top" title="

                                @switch($item->result_mark)
                                @case($item->result_mark <= 10)
                                    Приказ о применении мер взыскания
                                @break

                                @case($item->result_mark >= 11 && $item->result_mark <=20)
                                    Не привлекать в дальнейшем к выполнению данной группы задач – Срочные задачи
                                @break
                                @case($item->result_mark >= 90 && $item->result_mark <=100)
                                    Включить в резерв замещения руководящих должностей
                                @break
                                @case($item->result_mark >= 101 )
                                    Приказ о поощрении.
                                @break
                                @default
                                    Не предринимать никаких действий.
                            @endswitch

                                    " class="fa fa-question-circle" aria-hidden="true">

                            @endif

                            </td>


                            <td class="task-cell--result_type_id">
                                {{!is_null($item->getTypeById($item->result_type_id)) ?
                                 $item->getTypeById($item->result_type_id)->title : '' }}</td>
                        <td class="task-cell--result_desc">{{$item->result_desc}}</td>

                        @if(auth()->user()->role === 2)
                            <td>
                            <button class="edit-table "
                                    style="cursor:pointer"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateTasksModal-{{$item->id}}"

                            >
                                <i class="fas fa-pen"></i>
                            </button>
                                @include('frontend.pages.tasks.modal-update', [
                              'task'=> $item,

                              ])
                                @endif
                        </td>



                    </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

@endsection
