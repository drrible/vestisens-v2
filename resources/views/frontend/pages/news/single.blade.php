@extends('frontend._layouts.app')

@section('content')

    <style>
        .news-block .news-img img{
            object-fit: contain;
        }
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

    <div class="section section_news-single">
        <div class="container">

            <div class="row news-block">

                <div class="col-12 d-flex justify-content-center text-center m-auto">
                    <div class="news-info text-center">
                        <h3>{{$post->title}}</h3>
                        <div class="datetime mb-5">
                            <time >{{$post->getFrontDate($post->pub_date)}}</time>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    @if(file_exists($post->getPhoto()))
                        <div class="news-img">
                            <img src="{{$post->getPhoto()}}" alt="">
                        </div>
                    @endif
                    <div class="news-info">
                        <div class="news-content">
                         {!! $post->text_full !!}
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection
