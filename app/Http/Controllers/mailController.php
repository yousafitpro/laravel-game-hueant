<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class mailController extends Controller
{
   public static function sendMail($reciever,$subject,$data,$view)
   {
       Session::put('subject',$subject);
       Session::put('reciever',$reciever);

       Mail::send($view, ['data' => $data], function ($m)  {
           $m->from(Config::get('myconfig.mail.from'),Config::get('myconfig.mail.company_name'))
               ->subject($_SESSION['subject'])
               ->to($_SESSION['reciever'],"ok");

       });
   }
}
