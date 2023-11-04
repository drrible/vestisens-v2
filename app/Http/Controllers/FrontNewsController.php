<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Support\Facades\Auth;

class FrontNewsController extends Controller
{

    public function newsMain(){
        $category = NewsCategory::findOrfail(1);;
        return view('frontend.pages.home.index',  compact('category'));
    }
    public function newsCategory($id){

        $category = NewsCategory::findOrfail($id);

        $categoryNews = $category->news->sortByDesc('pub_date')->all();

        return view('frontend.pages.news.category',  compact('category', 'categoryNews'));
    }



    public function newsPost($id){
        $post = News::find($id);
        return view('frontend.pages.news.single',  compact('post'));
    }


    public function studyBlock()
    {

        $category = NewsCategory::findOrfail(2);;
        return view('frontend.pages.studyBlock.index',  compact('category'));
    }


    public function studyBlockPost($id){
        $post = News::find($id);
        return view('frontend.pages.news.single',  compact('post'));
    }


    public function meditation()
    {
        $category = NewsCategory::findOrfail(3);;
        return view('frontend.pages.meditation.index',  compact('category'));
    }
    public function meditationPost($id){
        $post = News::find($id);
        return view('frontend.pages.news.single',  compact('post'));
    }

}
