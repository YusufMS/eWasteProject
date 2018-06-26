<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class userprofileController extends Controller
{
    public function profileInfo($id)
    {
        $userlog = DB::table('user')->where('id', Auth::user()->id)->first();
        if ($userlog->_usertype == 'buyer'){
            $user = DB::table('buyer')->where('user_id', $userlog->id)->first();
        }elseif ($userlog->_usertype == 'seller'){
            $user = DB::table('seller')->where('user_id', $userlog->id)->first();
        }

        return view('profileInfo', ['user' => $user, 'userlog' => $userlog]);
    }
}


