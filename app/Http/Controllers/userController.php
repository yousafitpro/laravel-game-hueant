<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showProfile()
    {
        $user=Auth::user();
        return view('pages.user.update-profile')->with('user',$user);
    }
    public function updateProfile(Request $request)
    {
      $user=User::find(Auth::user()->id);
      $user->fname=$request->fname;
      $user->lname=$request->lname;
      $user->phone=$request->phone;
      $user->address=$request->address;
//        $user->password=bcrypt($request->password);
        Session::put('success-msg',"Profile Successfully Updated.");
        $user->save();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->delete($user->profile_image);
            $path = $request->file('image')->storeAs('profileimages',$user->id.'.'.$extension);

            $user->profile_image= $path;

            $user->save();
        }
        return view('pages.user.update-profile')->with('user',$user);

    }
    public function resetPassword(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $user->password=bcrypt($request->password);
        Session::put('success-msg',"Password Successfully Updated.");
        $user->save();
        return view('pages.user.update-profile')->with('user',$user);
    }
}
