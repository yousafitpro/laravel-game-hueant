<?php

namespace App\Http\Controllers\Admin;

use App\Models\game;
use App\Models\tournament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    public function addView()
    {
        $games=game::where('user_id',Auth::user()->id)->get();
        return view('admin.tournament.add')->with('games',$games);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:games',
            'game_id'=>'required|exists:games,id',
            'start_date'=>'required',
            'status'=>'required',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.tournament.add')->withErrors($validator);
        }
        $tournament=new tournament();
        $tournament->name=$request->name;
        $tournament->game_id=$request->game_id;
        $tournament->start_date=$request->start_date;
        $tournament->status=$request->status;
        if($tournament->save())
        {
            Session::put('success-msg','Tournament Successfully Added');
        }
        return redirect(route('admin.tournament.add'));
    }
    public function getOne($id)
    {
        $games=game::where('user_id',Auth::user()->id)->get();
        $tournament=tournament::where('id',$id)->with('game')->first();
        return view('admin.tournament.update')->with(['tournament'=>$tournament,'games'=>$games]);
    }
    public function deleteOne($id)
    {
        $tournament=tournament::find($id);
        if($tournament->delete())
        {
            Session::put('success-msg',"Tournament Successfully Deleted");
        }
        return redirect(route('admin.tournament.getAll'));
    }
    public function update(Request $request,$id)
    {

        $tournament=tournament::find($id);
        $tournament->name=$request->name;
        $tournament->game_id=$request->game_id;
        $tournament->start_date=$request->start_date;
        $tournament->status=$request->status;
        if($tournament->save())
        {
            Session::put('success-msg',"Tournament Successfully Updated");
        }
        return redirect(route('admin.tournament.getAll'));
    }
    public function getAll()
    {
        $tournaments=tournament::where('user_id',Auth::user()->id)->with('user')->get();
        return view('admin.tournament.all')->with('tournaments',$tournaments);
    }
}
