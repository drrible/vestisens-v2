<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;


class UsersController extends Controller
{

    public function index()
    {

        $title_list = 'Список Пользователей';
        $title_add = 'Добавить ';
        $route_add = 'users.create';
        $route_edit = 'users.edit';
        $route_remove = 'users.destroy';

        $users = User::orderBy('id', 'desc')->paginate(10);
//        dd($users->first());
//        dd($users->first()->position);

        return view ('admin.users.index' ,
            compact('users',

            'title_list', 'title_add', 'route_add', 'route_edit', 'route_remove'
            )

        );
    }


    public function create()
    {



        return view('admin.users.create' ,);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
          'fullname' => 'required',
          'email' => 'required|email|unique:users,email',
        ]);




//        dd($formattedRequest->all());


        $user=User::create($request->all());

//        $user->password = bcrypt($formattedRequest->get('password'));

        $user->uploadPhoto($request->file('photo'));

        return redirect()->route('users.index');
    }




    public function edit($id)
    {

        $user = User::find($id);
        return view('admin.users.edit' , compact('user',
        ));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request,[
          'fullname' => 'required',
          'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id),
          ],
          'photo' => 'nullable|image'
        ]);




        $user->update($request->all());
//        $user->update($request->get('password'));
//        $user->generatePassword($request->get('password'));

        $user->uploadPhoto($request->file('photo'));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->remove();

        return redirect()->route('users.index');
    }



    public function testingInfo($id){
        $user = User::find($id);

        $allTests = Testing::all();
        return view('admin.users.testingInfo' , compact('user', 'allTests'));

    }

}
