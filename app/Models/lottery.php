<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class lottery extends Model
{
    public function __construct()
    {
        if(Auth::check())
        {
            $this->user_id=Auth::user()->id;
        }

    }
    public function user()
    {
        return $this->hasOne(User::class,'role_id', 'id');
    }
    public function tournament()
    {
        return $this->hasOne(tournament::class,'id', 'tournament_id');
    }
}
