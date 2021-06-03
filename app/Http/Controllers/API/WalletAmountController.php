<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\score;
use App\Models\wallet_amount;
use App\Models\withdrawalrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletAmountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function set_wallet_amount(Request $request)
    {
        $score=new wallet_amount();
        $score->amount=$request->amount;
        $score->save();
        $total=wallet_amount::where("user_id",Auth::user()->id)->get()->sum('amount');
        return response()->json(['message'=>"Successfully Updated",'amount'=>$request->amount,'total_amount'=>$total],200);
    }
    public function get_wallet(Request $request)
    {
        $requests=withdrawalrequest::where('user_id',Auth::user()->id)->get();
        return response()->json(['data'=>$requests],200);
    }
}
