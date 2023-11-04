<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\TestingCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;


class TestsCategoriesController extends Controller
{


    public function index()
    {
        $title_list = 'Список Категории для тестов';
        $title_add = 'Добавить';
        $route_add = 'tests-categories.create';
        $route_edit = 'tests-categories.edit';
        $route_remove = 'tests-categories.destroy';
        $model = TestingCategory::orderBy('id', 'desc')->paginate(10);

        return view('admin.testsCategories.index',
            compact('model', 'title_list', 'title_add',
                'route_add', 'route_edit', 'route_remove'));
    }


    public function create()
    {
        return view('admin.testsCategories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:news',
        ]);

        TestingCategory::create($request->all());

        return redirect()->route('tests-categories.index');
    }

    public function edit($id)
    {

        $model = TestingCategory::find($id);
        return view('admin.testsCategories.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $model = TestingCategory::find($id);

        $this->validate($request, [
            'title' => [
                'required',
                Rule::unique('testing_categories')->ignore($model->id),
            ],

        ]);

        $model->edit($request->all());
        return redirect()->route('tests-categories.index');
    }

    public function destroy($id)
    {
        TestingCategory::find($id)->remove();

        return redirect()->route('tests-categories.index');
    }

}
