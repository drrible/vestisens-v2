@extends('admin._layout.content')



@section('content')

    <div id="wrapper">
        <div class="dash-content ">
            <div class="container">

                <div class="row pt-5 ">
                    <div class="col-md-12">
                        <div class=" mt-3">

                            <h2 class=" d-inline-block mb-3 mr-2">{{$model->title}}</h2>


                        </div>
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped ">
                                <thead class="">
                                <tr>
                                    <th class="table-id">ID</th>
                                    <th>Дата</th>
                                    <th>Пользователь</th>
                                    <th>Результат</th>
                                    <th>Рекомендации</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($model->userTests as $item)

                                    <style>
                                        .text-over{
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            max-width: 400px;
                                        }
                                    </style>


                                    <tr>
                                        <td class="table-id ">{{$item->id}}</td>
                                        <td class=" ">{{$item->created_at}}</td>
                                        <td class=" ">{{$item->user->fullname}}</td>
                                        <td class=" ">{{$item->answer_description}}</td>
                                        <td class=" ">{{$item->answer_recommendations}}</td>



                                    </tr>

                                @endforeach




                                </tbody>
                            </table>


                        </div>

                    </div>
                    <div class="mar-center pt-4">

                    </div>


                </div>
            </div>


        </div>
    </div>


@endsection
