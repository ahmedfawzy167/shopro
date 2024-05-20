<?php

namespace App\Http\Controllers\Dashboard;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'permission_name' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $permission = Permission::create(['name' => $request->permission_name]);

        $role = Role::create([
            'name' => $request->role_name,
        ]);

        $role->givePermissionTo($permission);

        Session::flash('message', 'Permission Created Successfully');
        return redirect(route('permissions.index'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        $roles = Role::all();
        return view('permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'permission_name' => 'required|string|between:2,100',
            'role_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $permission = Permission::findOrFail($id);
        $permission->name = $request->permission_name;
        $permission->save();

        $role = Role::findOrFail($request->role_id);
        if (!$role) {
            return redirect()->back()->withErrors(['role_id' => 'Role Not Found.'])->withInput();
        }

        $role->syncPermissions($permission);

        Session::flash('message', 'Permission Updated Successfully');
        return redirect(route('permissions.index'))->withInput();
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        $roles = $permission->roles;
        return view('permissions.show', compact('permission', 'roles'));
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        Session::flash('message', 'Permission Deleted Now');
        return redirect()->route('permissions.index');
    }
}
