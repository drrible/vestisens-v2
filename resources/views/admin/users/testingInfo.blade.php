@extends('admin._layout.content')





@section('content')

    <div id="wrapper">
        <div class="  show-content">
            <div class="container">
                <div class="row justify-content-center ">

                    <div class="row ">

                        <div class="col-12 d-flex justify-content-center text-center m-auto mt-5 mb-5">
                            <div class="news-info text-center">
                                <h3> Тесты пройденные пользователем: <span class="fw-bold">{{$user->fullname}}</span></h3>
                            </div>
                        </div>

                        <div class="col-8 me-auto ms-auto">
                            @foreach( $allTests as $test)

                                @if($test->answer_input_type->value != 'empty')
                                    <div class="card mb-1">
                                        <div class="card-header df-alc-jsb  ">

                                            <h5>{{$test->title}}</h5>

                                        </div>

                                        <div class="card-body">

                                            @foreach( $test->userTests->sortByDesc('created_at') as $userTest)
                                                @if($userTest->user_id == $user->id)
                                                    <div class="card-header ">

                                                        <h5  class="mr-3">Дата
                                                            : {{$userTest->created_at->format('d.m.Y. H:i:s')}}</h5>
                                                        <div> <h6><b>Результат : </b>{{$userTest->answer_description}}</h6></div>
                                                        <div class="dropdown mt-1">
                                                            <button
                                                                class="btn  px-1 btn-outline-primary dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <span class="fs-6">Рекомендации</span>
                                                            </button>
                                                            <div class="dropdown-menu" style="max-width: 350px">
                                                                <div class="ps-2">
                                                                    {{$userTest->answer_recommendations}}
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                @endif
                                            @endforeach
                                        </div>


                                    </div>
                                @endif

                            @endforeach


                        </div>

                    </div>
                </div>


            </div>
        </div>

@endsection
