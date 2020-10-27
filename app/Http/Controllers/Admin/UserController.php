<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateFormRequest;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users=User::all();  
        return view('backend.user.index',compact('users'));
        // foreach($users as $user){
        //     echo $user->roles()->pluck('name')->implode(' ');
        // }
    }

    public function edit($id){
        $user=User::whereId($id)->firstOrFail();
        $roles=Role::all();
        $selectedRole=$user->roles()->pluck('name')->toArray();
        //return $selectRole;
        return view('backend.user.edit',compact('user','roles','selectedRole'));
    }

    public function update(UserUpdateFormRequest $request,$id){
        $user=User::whereId($id)->firstOrFail();
        $user->syncRoles($request->get('role'));
        return redirect(action('admin\UserController@edit',$id))->with('status','Successfully edited');
    }
}
