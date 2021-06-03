<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\listeduser;
use App\Models\tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class leaderboardController extends Controller
{

    public function leaderboard($id)
    {
        $t=tournament::where('game_id',$id)->first();
        $users=listeduser::where('game_id',$id)->orderBy('time','ASC')->with('user')->get();

        return view('user.leaderboard.show')->with(['users'=>$users,'game_id'=>$id,'tournament'=>$t]);
    }
    public function updateAmount(Request $request,$id)
    {
        $t=tournament::where('game_id',$id)->first();
        $t->collected_amount=$request->amount;
        $t->save();
        Session::put('success-msg',"Amount Successfully Updated");
     return \redirect(route('admin.leaderboard.show',$id));
    }
}
