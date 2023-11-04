<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;


class NewsCategoriesController extends Controller
{


    public function index()
    {
        $title_list = 'Список Категории ';
        $title_add = 'Добавить';
        $route_add = 'news-categories.create';
        $route_edit = 'news-categories.edit';
        $route_remove = 'news-categories.destroy';
        $model = NewsCategory::orderBy('id', 'desc')->paginate(10);

        return view('admin.newsCategories.index',
            compact('model', 'title_list', 'title_add',
                'route_add', 'route_edit', 'route_remove'));
    }


    public function create()
    {
        return view('admin.newsCategories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:news',
        ]);

        NewsCategory::add($request->all());

        return redirect()->route('news-categories.index');
    }

    public function edit($id)
    {

        $model = NewsCategory::find($id);
        return view('admin.newsCategories.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $model = NewsCategory::find($id);

        $this->validate($request, [
            'title' => [
                'required',
                Rule::unique('news')->ignore($model->id),
            ],

        ]);

        $model->edit($request->all());
        return redirect()->route('news-categories.index');
    }

    public function destroy($id)
    {
        NewsCategory::find($id)->remove();

        return redirect()->route('news-categories.index');
    }

}
