<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;


class NewsController extends Controller
{



    public function index()
    {
        $title_list = 'Список Новостей';
        $title_add = 'Добавить';
        $route_add = 'news.create';
        $route_edit = 'news.edit';
        $route_remove = 'news.destroy';
        $model = News::orderBy('id', 'desc')->paginate(10);
        $categories = NewsCategory::all();
        return view ('admin.news.index' ,
            compact('model','title_list', 'title_add', 'categories',
                'route_add' , 'route_edit' , 'route_remove'));
    }


    public function create()
    {
        $categories = NewsCategory::all();
        return view('admin.news.create',compact( 'categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
          'title' => 'required|unique:news',

        ]);

//        \Str::slug($request->title);
        $request['pub_date'] =   date("Y-m-d", strtotime($request->pub_date));
        $news = News::add($request->all());
        $news->uploadPhoto($request->file('photo'));

        return redirect()->route('news.index');
    }

//    public function show($id)
//    {
//        $levels = UserPosition::find($id);
//        return view('userPosition.show' , compact('user'));
//    }


    public function edit($id)
    {
        $categories = NewsCategory::all();
        $model = News::find($id);
        return view('admin.news.edit' , compact('model', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $model = News::find($id);

        $this->validate($request,[
            'title' => [
                'required',
                Rule::unique('news')->ignore($model->id),
            ],
//            'photo' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        $request['pub_date'] =   date("Y-m-d", strtotime($request->pub_date));


        $model->edit($request->all());
        $model->uploadPhoto($request->file('photo'));

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        News::find($id)->remove();

        return redirect()->route('news.index');
    }

}
