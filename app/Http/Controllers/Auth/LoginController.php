<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function doLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|max:255|email',
            'password' => 'required|min:6'
        ]);



        $data=$request->only('email','password');



        if(Auth::attempt($data)){
            //    dd($data);
            return redirect()->to('/posts/create')->with('success','Success');


        }else{

            return redirect()->back()->with('error','login failed');
        }
    }
}
