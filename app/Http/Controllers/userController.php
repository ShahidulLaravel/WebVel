<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserPassUpdate;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\User as AuthUser;

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
    function edit_profile(){
        return view('admin.users_task.edit_profile');
    }

    function update_info(Request $request){
        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('success', 'Information Updated Successfully'); 
        
    }

    function update_password(UserPassUpdate $request){
       if(Hash::check($request->old_password,Auth::user()->password)){
            User::find(Auth::id())->update([
                'password' =>bcrypt($request->password)
            ]);
            return back()->with('pass_success', 'Password Updated Successfully');
       }else{
        return back()->with('error', 'Your Old Password is Wrong');
       }
    }

    function update_image(Request $request){
        $request->validate([
            'photo' => ['required', 'mimes:png,jpg,jpeg,JPEG,JPG,PNG'],
            'photo' => 'file|max:3072'
        ]);
        $prev = public_path('upload/user/'. Auth::user()->photo);
        unlink($prev);
        //file naming
        $upload_photo = $request->photo;
        $extension = $upload_photo->getClientOriginalExtension();
        $file_name = Auth::id(). '.' .$extension;
        //package code
        Image::make($upload_photo)->save(public_path('upload/user/'.$file_name));
        //update image and send it to databse
        User::find(Auth::id())->update([
            'photo' => $file_name,
        ]);
        return back()->with('img_success', 'Profile Photo Updated Successfully');
        
    }
}
