<?php

namespace App\Http\Controllers\Auth;

use App\user;
use App\seller;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\user
     */


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'description' => 'text | max:1000',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function create(array $data)
    {





//        $data->validate([
//            'name' => 'required|string|max:255',
//            'address' => 'required|string|max:255',
//            'phone' => 'required|string|max:15',
//            'description' => 'text | max:1000',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ]);





        $user = DB::table('user')->select('id')->where('email', $data['email'])->where('password', $data['password'])->get();
        foreach ($user as $user_id)
            $id = $user_id->id;

        if ($user) {

            return redirect()->to('/register')->with('error', 'You have already registered.');



        } else {


            return user::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                '_usertype' => "seller",
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['tpno'],
                'description' => $data['description'],
            ]);


        }


    }
}
