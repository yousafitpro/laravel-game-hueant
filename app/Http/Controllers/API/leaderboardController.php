<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\listeduser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class leaderboardController extends Controller
{
    public function send_time(Request $request)
    {
//        if(!listeduser::find(auth('api')->user()->id))
//        {
//            return response()->json(['message'=>"Sorry! You are not the part of this Tournament"],409);
//        }
          $obj=new listeduser();
          $obj->time=$request->time;
          $obj->game_id=$request->game_id;
          $obj->save();
          return response()->json(['message'=>"Time Successfully Saved"],200);

    }

}
