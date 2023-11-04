@extends('frontend._layouts.app')

@section('content')

    <div class="section section_news-single">
        <div class="container">

            <div class="row ">

                <div class="col-12 d-flex justify-content-center text-center m-auto">
                    <div class="news-info text-center">
                        <h3>{{$test->title}}</h3>

                    </div>
                </div>

                <div class="col-12">
                    <div class="img">
                        <img src="{{$test->getPhoto()}}" alt="">
                    </div>

                    <div class="content">
                        {!! $test->content !!}
                    </div>


                    {{--                        {{dd(App\Enum\TestingResultTypeEnum::text())}}--}}


                    @if($test->answer_input_type->value != 'empty')
                        <form action="{{route('testing.create')}}" method="POST">

                            {{csrf_field()}}
                            <input type="hidden" name="test_id" value="{{$test->id}}">
                            <input type="hidden" name="answer_input_type" value="{{$test->answer_input_type->value}}">

                            {{--                        <input type="hidden" name="answer_desc" value="{{$test->answer_variants}}">--}}


                            <div class="row justify-content-center">
                                <div class="col-10">
                                    <div class="card">


                                        <div class="card-body">
                                            @if($test->answer_input_type->value == 'input_from_image')

                                                @foreach($test->questions as $question)
                                                    <img src="{{$question->image}}" alt="">
                                                    <h6  >{{$question->title}}</h6>

                                                    @if(count($test->questions)> 1)
                                                        <input class="form-control mt-2" type="number" min="0"
                                                               name="answer[]" placeholder="Введите ответ">
                                                    @else
                                                        <input class="form-control mt-2" type="number" min="0"
                                                               name="answer" placeholder="Введите ответ">
                                                    @endif

                                                @endforeach

                                            @elseif($test->answer_input_type->value == 'radio_from_image' || $test->answer_input_type->value == 'radio_from_audio')

                                                @foreach($test->questions as $index=>$question)

                                                    @if($test->answer_input_type->value == 'radio_from_audio')
                                                        <audio class="mt-1" controls  style="max-width: 448px;width: 100%;">
                                                            <source src="{{$question->audio}}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                        @else
                                                        <img src="{{$question->image}}" alt="">
                                                    @endif

                                                    <h6 class="">{{$question->title}}</h6>

                                                    @php
                                                        $variants = explode(',', trim($question->answerVariants[0]->title))
                                                    @endphp
                                                    <div class="df df-wrap flex-start">

                                                        @foreach($variants as $variant)

                                                            @php
                                                            $randId = Str::random(9);
                                                            @endphp
                                                            <div class="switcher">
                                                                <input hidden type="radio" id="{{$randId}}" value="{{$variant}}"
                                                                       name="answer[{{$index}}]">
                                                                <label for="{{$randId}}" class="p-3 m-1 mb-1 text-white ">
                                                                    <span class="fs-4">{{$variant}}</span>
                                                                </label>

                                                            </div>

                                                        @endforeach
                                                    </div>

                                           @endforeach

{{--                                            @elseif($test->answer_input_type->value == 'radio_from_audio')--}}

{{--                                                @foreach($test->questions as $index=>$question)--}}

{{--                                                   --}}

{{--                                                    <h5 class="f-16">{{$question->title}}</h5>--}}
{{--                                                    @php--}}
{{--                                                        $variants = explode(',', trim($question->answerVariants[0]->title))--}}
{{--                                                    @endphp--}}
{{--                                                    <div class="df df-wrap flex-start">--}}

{{--                                                        @foreach($variants as $variant)--}}
{{--                                                            <label class="btn bg-primary p-3 m-1 mb-1 text-white ">--}}
{{--                                                                <span class="fs-4">{{$variant}}</span>--}}
{{--                                                                <input hidden type="radio" value="{{$variant}}"--}}
{{--                                                                       name="answer[{{$index}}]">--}}
{{--                                                            </label>--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}

{{--                                                @endforeach--}}



                                            @elseif($test->answer_input_type->value == 'input')

                                                <h5 class="f-16">{{$test->questions[0]->title}}</h5>

                                                <input class="form-control mt-2" type="number" min="0" name="answer"
                                                       placeholder="Введите ответ">

                                            @endif


                                            {{--            <select name="answer">--}}
                                            {{--            <option>Выбирите ответ</option>--}}
                                            {{--          @foreach(json_decode($test->answer_variants) as $key=>$item)--}}
                                            {{--        <option value="{{$key}}">{{$item->variant}}</option>--}}
                                            {{--        @endforeach--}}
                                            {{--        </select>--}}


                                        </div>


                                        <button type="submit" class="btn btn-success p-2 mt-3 text-white "> Отправить
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    @endif

                </div>


            </div>

        </div>
    </div>

@endsection
