<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\game;
use App\Models\lottery;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    public function addView()
    {
        return view('admin.game.add');
    }
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:roles',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.game.add')->withErrors($validator);
        }
        $game=new game();
        $game->name=$request->name;
        if($game->save())
        {
            Session::put('success-msg','Game Successfully Added');
        }
        return redirect(route('admin.game.add'));
    }
    public function getOne($id)
    {
        $game=game::find($id);

        return view('admin.game.update')->with('game',$game);
    }
    public function deleteOne($id)
    {
        $game=game::find($id);
        if($game->delete())
        {
            Session::put('success-msg',"Game Successfully Deleted");
        }
        return redirect(route('admin.game.getAll'));
    }
    public function update(Request $request,$id)
    {

        $game=game::find($id);
        $game->name=$request->name;
        if($game->save())
        {
            Session::put('success-msg',"Game Successfully Updated");
        }
        return redirect(route('admin.game.getAll'));
    }
    public function getAll()
    {
        $games=game::where('user_id',Auth::user()->id)->with('user')->get();
        return view('admin.game.all')->with('games',$games);
    }
}
