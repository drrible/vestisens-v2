@extends('frontend._layouts.app')

@section('content')

    <div class="section section_news-single">
        <div class="container">

            <div class="row ">

                <div class="col-12 d-flex justify-content-center text-center m-auto">
                    <div class="news-info text-center">
                        <h3>Пройденные тесты</h3>

                    </div>
                </div>

                <div class="col-12">
                    @foreach( $allTests as $test)

                        @if($test->answer_input_type->value != 'empty')
                            <div class="card mb-1">
                                <div class="card-header df-alc-jsb  ">

                                    <h5>{{$test->title}}</h5>
                                    <a class="btn btn-outline-success px-2  " style="white-space: nowrap"
                                       href="{{route('testing.show',$test->id)}}">Пройти тест</a>
                                </div>

                                <div class="card-body">

                                    @foreach( $test->userTests->sortByDesc('created_at') as $userTest)
                                        @if($userTest->user_id == auth()->user()->id)
                                            <div class="card-header ">

                                                    <div class="mr-3">Дата : {{$userTest->created_at->format('d.m.Y. H:i:s')}}</div>
                                                    <div><b>Ваш результат : </b>{{$userTest->answer_description}}</div>
                                                    <div class="dropdown mt-1">
                                                        <button class="btn  px-1 btn-outline-primary dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                            <span class="fs-6"> Ваши рекомендации</span>
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



            @endif

            @endforeach
        </div>


    </div>
    </div>
    </div>

@endsection
