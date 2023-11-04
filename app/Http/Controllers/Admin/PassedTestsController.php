<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testing;
use App\Models\TestingCategory;
use App\Models\TestingUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Enum\TestingResultTypeEnum;




class PassedTestsController extends Controller
{

    public function index()
    {



        $model = Testing::orderBy('id', 'desc')->paginate(10);


        return view('admin.passedTests.index',
            compact('model',

            )

        );
    }


    public function show($id)
    {
        $model = Testing::where('id', $id)->first();
        return view('admin.passedTests.show', compact('model', ));
    }



}
