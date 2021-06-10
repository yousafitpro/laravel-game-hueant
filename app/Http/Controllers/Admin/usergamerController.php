<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gameuser;
use App\Models\listeduser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class usergamerController extends Controller
{
    public function add($id,$game_id)
    {

        if(gameuser::where('user_id',$id)->where('game_id',$game_id)->exists())
        {

            Session::put("error-msg","User Already Added");
            return redirect()->back();
        }
        $user=new gameuser();
        $user->game_id=$game_id;
        $user->user_id=$id;
        $user->save();
        Session::put("success-msg","User Successfully Added");
   return redirect()->back();
    }
    public function remove($id,$game_id)
    {
        $user=gameuser::where('game_id',$game_id)->where('user_id',$id);
        $user->delete();
        Session::put("success-msg","User Successfully Removed");
        return redirect()->back();
    }
    public function getAll($id)
    {
        $users=gameuser::where('game_id',$id)->with("user")->get();
        return view('admin.user.gameuser')->with(['users'=>$users,'game_id'=>$id]);
    }
    public function getAllListedUsers($id)
    {
        $users=User::where('type','!=','supper-admin')->get();
        return view('admin.user.listeduser')->with(['users'=>$users,'game_id'=>$id]);
    }
}
