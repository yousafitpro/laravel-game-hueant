<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\withdrawalhistory;
use Illuminate\Http\Request;

class WithdrawalhistoryController extends Controller
{
    public function getAll()
    {
        $histories=withdrawalhistory::with('user')->get();
        return view('admin.withdrawalHistory.all')->with('histories',$histories);
    }
}
