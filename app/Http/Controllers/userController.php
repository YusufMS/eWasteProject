<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use DB;
use App\Seller;
use App\User;
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


            $table = new user();

            $table->email = $request->input('email');
            $table->password = bcrypt($request->input('password'));
            $table->first_name = $request->input('fname');
            $table->last_name = $request->input('lname');
            $table->address = $request->input('address');
            $table->phone = $request->input('tpno');
            $table->description = $request->input('description');
            $table->_usertype = $request->input('userType');

            $table->save();



            $user = DB::table('user')->select('id', '_usertype')->where('email', $request->input('email'))->get();
            foreach ($user as $usr)
                $id = $usr->id;
            $uType = $usr->_usertype;

            if ($uType == "seller") {

                return redirect()->to('/login')->with('success', 'Successfully registered');


            }else{
                $buyerType = $request->input('buyerType');
                $buyerType = implode(',', $buyerType);
                $webAddress = $request->input('webAddress');

                DB::table('buyer')->insert(
                    ['type' => $buyerType, 'user_id' => $id, 'website' => $webAddress]
                );

                return redirect()->to('/login')->with('success', 'Successfully registered');
            }
        }

    }


    public function login()
    {
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


                    return redirect('/sellerHome')->with('success', 'You are successfully logged in.');

                }elseif($type->_usertype == 'admin'){

                    return redirect('/admin')->with('success', 'You are successfully logged in.');

                }
                else {
                    return redirect('/buyerHome')->with('success', 'You are successfully logged in.');
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

