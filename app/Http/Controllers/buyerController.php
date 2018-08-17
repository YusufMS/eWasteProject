<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\buyer;
use App\posts;
use App\subWasteCategory;
use App\main_waste_category;
use Session;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Foundation\Auth\RegistersUsers;

class buyerController extends Controller
{


    // use RegistersUsers;

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
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }


    // public function index()
    // {
    //     Session::put('user_role', 'buyer');
    //     return redirect('/home');

    //     $main_categories = main_waste_category::take(6)->get();
    //     return view('buyer.index', compact(['main_categories']));
    // }

//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            // 'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:user',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//    }
//
//    protected function create(Request $request)
//    {
//
//
//        $checkuser = DB::table('user')->where([
//            ['email', '=', $request->input('email')],
//            ['_usertype', '=', 'user'],
//        ])->exists();
//
//        if ($checkuser) {
//            return redirect()->to('/regBuyer')->with('error', 'There is a user already registered with this email.');
//        } else {
//
//            $user = new User;
//            $user->email = $request->input('email');
//            $user->password = bcrypt($request->input('password'));
//            $user->_usertype = 'buyer';
//            $user->save();
//
//            $user = DB::table('user')->select('id')->where('email', $request->input('email'))->get();
//
//
//            foreach ($user as $user_id)
//                $id = $user_id->id;
//
//            $buyer = new buyer;
//            $buyer->name = $request->input('name');
//            $buyer->address = $request->input('address');
//            $buyer->phone = $request->input('tpno');
//            $buyer->type = $request->input('type');
//            $buyer->description = $request->input('description');
//            $buyer->user_id = $id;
//
//            $buyer->save();
//
//
//            return redirect('login')->with('success', 'success');
//        }
//
//
//    }
//
//
//
//    public function sellerPosts()
//    {
//        $maincat = DB::table('main_waste_category')->get();
//        foreach ($maincat as $main)
//            $subcat = DB::table('subWasteCategory')->where('main_category_id',$main->id)->get();
//        print_r($subcat);
//        $posts = DB::table('post')->orderby('updated_at', 'desc')->paginate(3);
////
//        return view('auth.buyer.index', ['posts'=>$posts ,'maincat'=>$maincat, 'subcat'=>$subcat]);
//
//    }
//
//}

}