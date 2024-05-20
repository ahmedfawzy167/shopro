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
        $users = User::with('type')->where('type_id', 6)->get();
        return view('users.index', compact('users'));
    }

    public function pending()
    {
        $pendingUsers = User::where('status', 'Pending')->paginate(20);
        return view('users.pending', compact('pendingUsers'));
    }

    public function accept($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Approved';
        $user->save();
        Session::flash('message', 'User Approved Successfully');
        return redirect()->route('users.pending');
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Rejected';
        $user->save();
        Session::flash('message', 'User Rejected Successfully');
        return redirect()->route('users.pending');
    }

    public function create()
    {
        $types = Type::all();
        return view('users.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|email|string|unique:users|max:200',
            'password' => ['required', Password::defaults()],
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


        Session::flash('message', 'User is Created Successfully');
        return redirect(route('users.index'));
    }

    public function show($id)
    {
        $user = User::with('type')->findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $types = Type::all();
        return view('users.edit', compact('user', 'types'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|max:400',
            'password' => 'required|min:10',
            'type_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
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
