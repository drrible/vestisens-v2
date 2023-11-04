<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

use App\Models\Testing;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{


    public function main()
    {
        return view('frontend.home.index');
    }

    public function aboutUs()
    {
        return view('frontend.pages.about.index');
    }

    public function contacts()
    {
        return view('frontend.pages.contacts.index');
    }


    public function trainingGames()
    {
        return view('frontend.pages.trainingGames.index');
    }

    public function motivation()
    {
        return view('frontend.pages.motivation.index');
    }



    public function dashboard()
    {
        return view('frontend.home.index');
    }



    public function profile($id = null)
    {

        $user = auth()->user();

        return view('frontend.pages.profile.index', compact('user',));
    }

    public function profileTests()
    {

        $allTests = Testing::all();

//        foreach ($allTests as  $test){
//                dd($test->userTests);
//        }
//
//        $userTests = Auth::user()->testingUser;


        return view('frontend.pages.profile.tests', compact('allTests',));
    }


    public function profileInfoUpdate(Request $request, $id)
    {

        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'about_me_desc' => ['required', 'string'],
            'age' => ['required'],
            'fullname' => ['required', 'string'],
        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()
            ], 422);
        }
        $user->edit($request->all());


        return response()->json(['success' => 'информация успешно обновлена', 'updatedInfo' => $user]);
    }


}
