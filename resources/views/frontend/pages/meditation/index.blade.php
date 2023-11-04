@extends('frontend._layouts.app')

@section('content')

    <style>

        .top-block{
            height: 52px;
            background-color: #f2f2f2;
            position: absolute;
            right: 0;
            left: 0;
            top: 0;
        }
        .iframe{
            position: relative;
        }
        .iframe iframe{
            width: 100%;height: 100vh;
        }

        .iframe iframe .header-container{
            display: none;
        }
    </style>



    @if(count($category->news) > 0)
        @php
            $category_pubs = $category->news -> pluck('show');
            $category_show = 0;

            foreach($category_pubs as $item){
              if($item == 1 ){
                $category_show = 1;
              }
            }
        @endphp

        @if($category_show)
            <div class="section section_news-category">
                <div class="container">

                    <div class="category-title">
                        <span>{{$category->title}}</span>
                    </div>


                    @foreach($category->news->sortByDesc('pub_date') as $key => $item)


                        @if($item->show)

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
        @else
            <div class="section section_news-category">
                <h3 class="text-center">Тут пока пусто, подождите немного</h3>
            </div>
        @endif
    @endif


{{--    <div class="iframe">--}}
{{--        <div class="top-block"></div>--}}
{{--        <iframe--}}
{{--                 src="https://useraudio.net/search/%D0%BC%D0%B5%D0%B4%D0%B8%D1%82%D0%B0%D1%86%D0%B8%D1%8F-%D0%B7%D0%B4%D0%BE%D1%80%D0%BE%D0%B2%D1%8C%D1%8F"></iframe>--}}


{{--    </div>--}}



@endsection




