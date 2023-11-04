<?php

namespace App\Http\Controllers;


use App\Models\Testing;
use App\Models\TestingCategory;
use App\Models\TestingUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Support\Facades\Auth;

class TestsController extends Controller
{

    public function index()
    {

        $testsCategories = TestingCategory::all();
        return view('frontend.pages.testing.index', compact('testsCategories'));
    }

    public function show($id)
    {
        $test = Testing::where('published', true)->findOrfail($id);
        $test->questions = json_decode($test->questions);



        return view('frontend.pages.testing.show', compact('test'));
    }

    public function create(Request $request)
    {

        $answer = $request->input('answer');
        $answerInputType = $request->input('answer_input_type');
        $test_id = $request->test_id;
        $test = Testing::find($test_id);

        $questions = json_decode($test->questions);
        $resultVariants = json_decode($test->result_variants);

        $answerResult = 0;

        $userTest = new TestingUser();
        $userTest->user_id = Auth::user()->getAuthIdentifier();
        $userTest->test_id = $test_id;
        $userTest->answer = json_encode($answer);

        $questionCount = count($questions);

        if ($questionCount > 1 && ($answerInputType === 'input_from_image'  ||  $answerInputType === 'radio_from_image' ||  $answerInputType === 'radio_from_audio')) {

            foreach ($answer as $key => $item) {

                $resultsArr = explode(",", $questions[$key]->answerVariants[0]->result);

                $count = count($resultsArr);
                $variantPercent = 1 / $count;

                foreach ($resultsArr as $var) {

                    if (str_contains($item, $var)) {
                        $answerResult = $answerResult + $variantPercent;
                    }
                }
            }


            foreach ($resultVariants as $itm) {
                $variant =  (int)$itm->variant;
                if($answerResult>=$variant){
                    $userTest->answer_result = $answerResult;
                    $userTest->answer_description = $itm->description;
                    $userTest->answer_recommendations = $itm->recommendations;
                }
            }


            if($answerResult == 0){
                    $userTest->answer_result = $answerResult;
                    $userTest->answer_description = 'нет подходящего описания';
                    $userTest->answer_recommendations = 'нет рекомендации';
            }


        }
        else if ($questionCount == 1 && $answerInputType === 'input_from_image'){

            foreach ($resultVariants as $itm) {

                // подсчет данных для результата
                $var = $itm->variant;


                if(str_contains($var, '-', )){

                    [$min, $max] = explode('-',$var );

                    if((int)$answer  >= (int)$min && (int)$answer  <= (int)$max){

                        $userTest->answer_result = $answer;
                        $userTest->answer_description = $itm->description;
                        $userTest->answer_recommendations = $itm->recommendations;

                    }

                }

               else if($answer == $itm->variant || (int)$answer >= (int)$itm->variant){

                    $userTest->answer_result = $answer;
                    $userTest->answer_description = $itm->description;
                    $userTest->answer_recommendations = $itm->recommendations;
                }
            }
        }

        else if($answerInputType === 'input'){
            foreach ($resultVariants as $itm) {
                if($answer == $itm->variant){
                    $userTest->answer_result = $answer;
                    $userTest->answer_description = $itm->description;
                    $userTest->answer_recommendations = $itm->recommendations;
                }
            }

            if(!$userTest->answer_result){
                $userTest->answer_result = $answer;
                $userTest->answer_description = 'нет подходящего описания';
                $userTest->answer_recommendations = 'нет рекомендации';
            }
        }

        $userTest->save();

        return redirect()->route('profile.tests');

    }


}
