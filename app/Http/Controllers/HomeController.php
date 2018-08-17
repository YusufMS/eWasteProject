<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\main_waste_category;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_categories = main_waste_category::take(6)->get();
        if (Session::get('user_role') == 'seller'){
            return view('welcomeSeller', compact(['main_categories']));
        } elseif(Session::get('user_role') == 'buyer'){
            return view('welcomeBuyer', compact(['main_categories']));            
        }
        
    }
    public function buyerIndex()
    {
        Session::put('user_role', 'buyer');
        return redirect('/home');

    }
    public function sellerIndex()
    {
        Session::put('user_role', 'seller');
        return redirect('/home');
    }

    public function guestIndex()
    {
        
        $main_categories = main_waste_category::take(6)->get();
        return view('welcomeGuest', compact(['main_categories']));
    }
}
