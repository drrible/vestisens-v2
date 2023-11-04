<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testing;
use App\Models\TestingCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Enum\TestingResultTypeEnum;




class TestsController extends Controller
{

    public function index()
    {



        $title_list = 'Список Тестов';
        $title_add = 'Добавить Тест';
        $route_add = 'tests.create';
        $route_edit = 'tests.edit';
        $route_remove = 'tests.destroy';

        $model = Testing::orderBy('id', 'desc')->paginate(10);


        return view('admin.tests.index',
            compact('model',

                'title_list', 'title_add', 'route_add', 'route_edit', 'route_remove'
            )

        );
    }


    public function create()
    {

        $categories = TestingCategory::all();
        $resultTypes = TestingResultTypeEnum::options();
        return view('admin.tests.create', compact('categories', 'resultTypes'));
    }


    public function store(Request $request)
    {

//        $this->validate($request, [
//            'title' => 'required|unique:testings',
//        ]);
        $answer_input_type = $request->input('answer_input_type');


        $test = new Testing();

        $test->fill($request->all());
        $test->uploadPhoto($request->file('photo'));


        if($answer_input_type == 'empty'){
            $test->questions = '[]';
            $test->result_variants = '[]';
        }

        $test->save();

        if($answer_input_type != 'empty'){
            $image_questions = $request->file('image-questions');
            $audio_questions = $request->file('audio-questions');



            $questions = json_decode($test->questions, false);

            if($image_questions){

                foreach ($image_questions as $key=>$item){

                    $filename = $key . '.'  . $item->getClientOriginalExtension();

                    $item->storeAs("/testing_images/".$test->id."/", $filename);

                    $questions[$key]->image = '/storage/testing_images/'.$test->id.'/'.$filename;

                }

                $test->questions = json_encode($questions);

            }

            if($audio_questions){

                foreach ($audio_questions as $key=>$item){

                    $filename = $key . '.'  . $item->getClientOriginalExtension();

                    $item->storeAs("/testing_audios/".$test->id."/", $filename);

                    $questions[$key]->audio = '/storage/testing_audios/'.$test->id.'/'.$filename;

                }

                $test->questions = json_encode($questions);

            }


        }


        $test->save();

        return redirect()->route('tests.index');
    }


    public function edit($id)
    {

        $model = Testing::find($id);
        $categories = TestingCategory::all();
        $resultTypes = TestingResultTypeEnum::options();
        return view('admin.tests.edit', compact('model',
            'categories', 'resultTypes'
        ));
    }

    public function update(Request $request, $id)
    {
        $test = Testing::find($id);

        $photo = $request->file('photo');
        $image_questions = $request->file('image-questions');
        $audio_questions = $request->file('audio-questions');
        $answer_input_type = $request->input('answer_input_type');
//        $this->validate($request, [
//            'title' => 'required',
//            'photo' => 'nullable|image'
//        ]);

        $requestArr = $request->all();
        if($answer_input_type == 'empty'){
            $requestArr = array_merge($requestArr, [
                'questions' => '[]',
                'result_variants' => '[]',
            ]);
        }

        $test->update($requestArr);

        if($photo){
            $test->uploadPhoto($request->file('photo'));
        }


        if($answer_input_type != 'empty'){
            $questions = json_decode($test->questions, false);

            if($image_questions && count($image_questions) > 0){

                foreach ($image_questions as $key=>$item){

                    $filename = $key . '.'  . $item->getClientOriginalExtension();

                    $fullFileName = 'testing_images/'.$test->id.'/'.$filename;

                    if(Storage::exists($fullFileName)){
                        Storage::delete($fullFileName);
                    }

                    $item->storeAs("/testing_images/".$test->id."/", $filename);
                    $questions[$key]->image = '/storage/'.$fullFileName;
                }

                $test->questions = json_encode($questions);

            }

            if($audio_questions && count($audio_questions) > 0){

                foreach ($audio_questions as $key=>$item){

                    $filename = $key . '.'  . $item->getClientOriginalExtension();

                    $fullFileName = 'testing_audios/'.$test->id.'/'.$filename;

                    if(Storage::exists($fullFileName)){
                        Storage::delete($fullFileName);
                    }

                    $item->storeAs("/testing_audios/".$test->id."/", $filename);
                    $questions[$key]->audio = '/storage/'.$fullFileName;
                }

                $test->questions = json_encode($questions);

            }


        }

        $test->save();

        return redirect()->route('tests.index');
    }

    public function destroy($id)
    {
        Testing::find($id)->delete();

        return redirect()->route('tests.index');
    }

}
