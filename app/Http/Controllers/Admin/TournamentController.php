<?php

namespace App\Http\Controllers\Admin;

use App\Models\game;
use App\Models\tournament;
use Carbon\Carbon;
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
            'name'=>'required',
            'duration'=>'required',
            'collected_amount'=>'required',
            'game_id'=>'required|exists:games,id',
            'start_date'=>'required|after_or_equal:now',
            'status'=>'required',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.tournament.add')->withErrors($validator);
        }
        $tournament=new tournament();
        $tournament->name=$request->name;
        $tournament->duration=$request->duration;
        $tournament->game_id=$request->game_id;
        $tournament->collected_amount=$request->collected_amount;
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
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'duration'=>'required',
            'game_id'=>'required|exists:games,id',
            'start_date'=>'required|after_or_equal:now',
            'status'=>'required',
            'collected_amount'=>'required'
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.tournament.add')->withErrors($validator);
        }
        $tournament=tournament::find($id);
        $tournament->collected_amount=$request->collected_amount;
        $tournament->name=$request->name;
        $tournament->duration=$request->duration;
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
    public function start(Request $request,$id)
    {
      $t=tournament::find($id);
//dd(Carbon::parse($t->start_date)->format('Y M d'));
      if(Carbon::parse($t->start_date)->format('Y M d')<Carbon::now()->format('Y M d'))
      {

          Session::put('error-msg',"Sorry You cannot start this before the Starting Date");

      }
      else
      {
          $t->is_started='1';
          if($t->save())
          {
              Session::put('success-msg',"Tournament Successfully Started");
          }
      }

      return \redirect(route('admin.tournament.getAll'));
    }
    public function end(Request $request,$id)
    {
        $t=tournament::find($id);
        $t->is_started='0';
        if($t->save())
        {
            Session::put('success-msg',"Tournament Successfully Ended");
        }
        return \redirect(route('admin.tournament.getAll'));
    }
}
