@extends('frontend._layouts.app')

@section('content')

    <div class="section section_news-single">
        <div class="container">

            <div class="row ">

                <div class="col-12 d-flex justify-content-center text-center m-auto">
                    <div class="news-info text-center">
                        <h3>Тесты</h3>

                    </div>
                </div>

                <div class="col-12">


                    @foreach( $testsCategories as $category)

                        <div class="card mb-1">
                            <div class="card-header">
                                <h5>{{$category->title}}</h5>
                            </div>

                            <div class="card-body df-fdc">

                                @foreach($category->testings as $test)

                                        <a class="card-header" href="{{route('testing.show',$test->id)}}">{{$test->title}}</a>

                                @endforeach

                            </div>

                        </div>
                    @endforeach


                </div>


            </div>

        </div>
    </div>

@endsection
