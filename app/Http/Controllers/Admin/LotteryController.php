<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\lottery;
use App\Models\tournament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LotteryController extends Controller
{
    public function addView()
    {
        $tournaments=tournament::where('user_id',\auth()->user()->id)->get();
        return view('admin.lottery.add')->with(['tournaments'=>$tournaments]);
    }
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin'=>'required|integer',
            'win1'=>'required|integer',
            'win2'=>'required|integer',
            'win3'=>'required|integer',
            'win4'=>'required|integer',
            'win5'=>'required|integer',
            'tournament_id'=>'required|integer',
            'sec_win'=>'required|integer',
            'sec_win_count'=>'required|integer',
            'sec_win_max_amt'=>'required|integer',
            'min_withdraw_amt'=>'required|integer',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.lottery.add')->withErrors($validator);
        }
        $lottery=new lottery();
        $lottery->admin=$request->admin;
        $lottery->tournament_id=$request->tournament_id;
        $lottery->win1=$request->win1;
        $lottery->win2=$request->win2;
        $lottery->win3=$request->win3;
        $lottery->win4=$request->win4;
        $lottery->win5=$request->win5;
        $lottery->sec_win=$request->sec_win;
        $lottery->sec_win_count=$request->sec_win_count;
        $lottery->sec_win_max_amt=$request->sec_win_max_amt;
        $lottery->min_withdraw_amt=$request->min_withdraw_amt;
        if($lottery->save())
        {
            Session::put('success-msg','lottery Successfully Added');
        }
        return redirect(route('admin.lottery.add'));
    }
    public function getOne($id)
    {
        $tournaments=tournament::where('user_id',\auth()->user()->id)->get();
        $lottery=lottery::where('id',$id)->with('tournament')->first();
        return view('admin.lottery.update')->with(['lottery'=>$lottery,'tournaments'=>$tournaments]);
    }
    public function deleteOne($id)
    {
        $lottery=lottery::find($id);
        if($lottery->delete())
        {
            Session::put('success-msg',"lottery Successfully Deleted");
        }
        return redirect(route('admin.lottery.getAll'));
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'admin'=>'required|integer',
            'win1'=>'required|integer',
            'win2'=>'required|integer',
            'win3'=>'required|integer',
            'win4'=>'required|integer',
            'win5'=>'required|integer',
            'sec_win'=>'required|integer',
            'sec_win_count'=>'required|integer',
            'sec_win_max_amt'=>'required|integer',
            'min_withdraw_amt'=>'required|integer',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.lottery.add')->withErrors($validator);
        }
        $lottery=lottery::find($id);
        $lottery->admin=$request->admin;
        $lottery->win1=$request->win1;
        $lottery->win2=$request->win2;
        $lottery->win3=$request->win3;
        $lottery->win4=$request->win4;
        $lottery->win5=$request->win5;
        $lottery->sec_win=$request->sec_win;
        $lottery->sec_win_count=$request->sec_win_count;
        $lottery->sec_win_max_amt=$request->sec_win_max_amt;
        $lottery->min_withdraw_amt=$request->min_withdraw_amt;
        if($lottery->save())
        {
            Session::put('success-msg',"lottery Successfully Updated");
        }
        return redirect(route('admin.lottery.getAll'));
    }
    public function getAll()
    {
        $lotteries=lottery::where('user_id',Auth::user()->id)->with('user')->get();
        return view('admin.lottery.all')->with('lotteries',$lotteries);
    }
}
