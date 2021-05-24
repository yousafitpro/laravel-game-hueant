<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\withdrawalhistory;
use App\Models\withdrawalrequest;
use Illuminate\Http\Request;

class WithdrawalrequestController extends Controller
{
    public function getAll()
    {
        $requests=withdrawalrequest::with('user')->get();
        return view('admin.withdrawalRequest.all')->with('requests',$requests);
    }
}
