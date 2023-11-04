@extends('admin._layout.content')



@section('content')

    <div id="wrapper">
        <div class="dash-content ">
            <div class="container">

                <div class="row pt-5 ">
                    <div class="col-md-12">
                        <div class=" mt-3">

                            <h2 class=" d-inline-block mb-3 mr-2">Пройденные тесты</h2>


                        </div>
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped ">
                                <thead class="">
                                <tr>
                                    <th class="table-id">ID</th>
                                    <th>Наименование</th>
                                    <th>
                                        Количество тестировании
                                    </th>


                                    <th class="w-5 text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($model as $item)

                                    <style>
                                        .text-over{
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            max-width: 400px;
                                        }
                                    </style>

                                    @if($item->answer_input_type != 'empty')
                                    <tr>
                                        <td class="table-id">{{$item->id}}</td>
                                        <td><a class="text-dark text-decoration-none" href="{{route('passed.testings.show', $item->id)}}">{{$item->title}}</a></td>
                                        <td>{{$item->userTests->count()}}</td>

                                        <td class="text-center">
                                            <a href="{{route('passed.testings.show', $item->id)}}" class="btn text-white table-btn bg-primary"
                                               data-toggle="tooltip" data-placement="bottom" title="Посмотреть"><i
                                                    class="fas fa-eye"></i></a>

                                        </td>

                                    </tr>
                        @endif
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
