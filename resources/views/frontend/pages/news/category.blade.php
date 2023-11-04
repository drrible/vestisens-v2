@extends('frontend._layouts.app')

@section('content')




    <div class="section section_news-category">
        <div class="container">

            <div class="text-center mb-3 d-flex justify-content-center">
                <h2>{{$category->title}}</h2>
            </div>

            @foreach($categoryNews as $key => $item)
                @if($item->show !== 0)
                    <div class="row news-block">
                        <div class="col-10 col-sm-5 col-md-4 col-lg-3">
                            <div class="news-img">
                                <img src="{{$item->getPhoto()}}" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                            <div class="news-info">
                                <a href="{{route('news.post',$item->id)}}" class="h3">{{$item->title}}</a>
                                <div class="news-content">
                                    {{$item->text_short}}
                                </div>
                                <div class="datetime">
                                    <time > {{$item->getFrontDate($item->pub_date)}}</time>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
    </div>




@endsection
