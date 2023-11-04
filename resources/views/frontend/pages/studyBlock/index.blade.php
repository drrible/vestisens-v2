@extends('frontend._layouts.app')

@section('content')



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
                                <span>Обучающий блок</span>
                            </div>



                            <div class="w-50 text-center ms-auto me-auto mt-2 mb-5"  >На данной странице Вам открывается возможность ознакомиться с текстовой и мультимедийной информацией о строении вестибулярной системы человека, особенностях ее работы, как со звуком, так и с восприятием цветовой палитры.</div>



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
                                                <a href="{{route('studyBlock.post',$item->id)}}" class="h3">{{$item->title}}</a>
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




@endsection



