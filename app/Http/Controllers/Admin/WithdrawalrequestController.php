<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\withdrawalhistory;
use App\Models\withdrawalrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalrequestController extends Controller
{
    public function getAll()
    {
        $requests=withdrawalrequest::where('user_id',Auth::user()->id)->with('user')->get();
        return view('admin.withdrawalRequest.all')->with('requests',$requests);
    }
}
