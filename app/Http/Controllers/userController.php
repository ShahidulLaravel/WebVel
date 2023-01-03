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
    public function userDelete($user_id){
        User::find($user_id)->delete();
        return back()->with('success', 'User Deleted Successfully');
    }
}
