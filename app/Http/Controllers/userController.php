<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function users(){
        $users = User::where('id', '!=', Auth::id())->get();
        $total_user = User::count();
        return view('admin.users_task.users', compact('users','total_user'));
    }
    public function userDelete(User $user){
        return back()->with('success', 'User Deleted Successfully');
    }
    public function userEdit(User $user){
        return view('admin.users_task.edit', compact('user'));
    }
    public function userUpdate(Request $request ,User $user){
      
        $request -> validate([
            'name'  => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        $user->update([
            "name"=> $request->name,
            "email"=> $request->email,
        ]);
        return redirect(route('users'))->with('success', 'Information Updated Successfully');
    }
}
