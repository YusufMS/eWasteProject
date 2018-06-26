<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use DB;
use App\seller;
use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class userController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }


    protected function create(Request $request)
    {

        $checkuser = DB::table('user')->where([
            ['email', '=', $request->input('email')],
            ['_usertype', '=', 'seller'],
        ])->exists();

        if ($checkuser) {
            return redirect()->to('/register')->with('error', 'There is a user already registered with this email.');
        } else {


            $table = new User();

            $table->email = $request->input('email');
            $table->password = bcrypt($request->input('password'));
            $table->_usertype = 'seller';
            $table->save();


            $user = DB::table('user')->select('id')->where('email', $request->input('email'))->get();


            $seller = new Seller();
            $seller->name = $request->input('name');
            $seller->address = $request->input('address');
            $seller->phone = $request->input('tpno');
            $seller->description = $request->input('description');


            foreach ($user as $user_id)
                $id = $user_id->id;

            $seller->user_id = $id;

            $seller->save();

            return redirect()->to('/login')->with('success', 'Successfully registered');
        }

    }


    public function login()
    {
        return('123');
        return view('auth.login');
    }


    public function doLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|max:255|email',
            'password' => 'required|min:6'
        ]);


        $data = $request->only('email', 'password');


        if (Auth::attempt($data)) {

            $buyerorseller = DB::table('user')->select('_usertype')->where('email', $request->input('email'))->get();

            foreach ($buyerorseller as $type) {
                if ($type->_usertype == 'seller') {


                    return redirect('/home')->with('success', 'You are successfully logged in.');

                }elseif($type->_usertype == 'admin'){

                    return redirect('/admin')->with('success', 'You are successfully logged in.');

                }
                else {
                    return redirect('/home')->with('success', 'You are successfully logged in.');
                }
            }
        } else {


            return redirect('login')->with('error', 'login failed');

        }
    }

    public function logout()
    {

        Auth::logout();
        Session::flush();
        return redirect('/loginView')->with('success', "Logged out");
    }

}

