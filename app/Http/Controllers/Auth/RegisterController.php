<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\seller;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
     * @return \App\User
     */
    protected function create(array $data)
    {

        $this->validate($data, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'description' => 'text | max:1000',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = DB::table('user')->select('id')->where('email', $data['email'])->where('password', $data['password'])->get();
        foreach ($user as $user_id)
            $id = $user_id->id;

        if ($user) {
            return seller::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['tpno'],
                'description' => $data['description'],
                'user_id' => $id
            ]);

        } else {
            return User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                '_usertype' => "seller"
            ]);

            return seller::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['tpno'],
                'description' => $data['description'],
                'user_id' => $id
            ]);

        }


    }
}
