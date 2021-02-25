<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;

class UserController extends Controller
{
    public function list_user()
    {
        $users = User::paginate(10);
        return view('admin.User.list_user', compact('users'));
    }
    public function role_permission()
    {
        $roles= Role::paginate(5);
        $permissions = Permission::paginate(5);
        return view('admin.User.permisson', compact('roles', 'permissions'));
    }
    public function get_home(Request $request){
        $permissions = Permission::paginate(5);
        if($request->ajax() || 'NULL'){
          $roles = Role::all();
          return view('admin.User.permisson',compact('roles', 'permissions'));
        }
    }
    public function role_user()
    {   
        $users = User::all();
        $roles = Role::all(); 
        return view('admin.User.role', compact('users', 'roles'));
    }
    public function update_role()
    {
        $user = User::findOrFail(request('user'));
        $user->role_id = request('role');
        $user->update();
        return \redirect('/list_user');
    }
    public function create_role()
    {

    }
}
