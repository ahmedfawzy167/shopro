<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\User;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('type')->where('type_id',6)->get();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        $types = Type::all();
        return view('users.create',compact('types'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email'=> 'required|email|string|unique:users|max:200',
            'password' => ['required',Password::defaults()],
            'type_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type_id = $request->type_id;
        $user->save();

        Session::flash('message','User is Created Successfully');
        return redirect(route('users.index'))->withInput();
    }


public function show($id)
{
    $user = User::find($id);
    $type = $user->type;
    $roles = $user->roles;

    return view('users.show',compact('user','type','roles'));
}

public function edit($id)
{
    $user = User::find($id);
    $types = Type::all();
    return view('users.edit',compact('user','types'));
}

public function update(Request $request,$id){

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|between:2,100',
        'email'=> 'required|string|max:400',
        'password' => 'required|min:10',
        'type_id' => 'required|numeric|gt:0',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->type_id = $request->type_id;
    $user->save();

    Session::flash('message', 'User is Updated Successfully');
    return redirect(route('users.index'))->withInput();
}

public function destroy($id)
{
    $user = User::find($id);
    $user->delete();
    Session::flash('message', 'User is Deleted Successfully');
    return redirect(route('users.index'));


}









}
