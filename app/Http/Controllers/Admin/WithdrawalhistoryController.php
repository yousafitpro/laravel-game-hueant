<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\withdrawalhistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalhistoryController extends Controller
{
    public function getAll()
    {
        $histories=withdrawalhistory::where('user_id',Auth::user()->id)->with('user')->get();
        return view('admin.withdrawalHistory.all')->with('histories',$histories);
    }
}
