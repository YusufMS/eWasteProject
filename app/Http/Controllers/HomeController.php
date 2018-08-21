<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sub_waste_category;
use App\Site_information;
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
        $sub_waste_categories = Sub_waste_category::take(6)->get();
        $site_info = Site_information::orderBy('created_at','desc')->take(5)->get();
        if (Session::get('user_role') == 'seller'){
            return view('welcomeSeller', compact(['sub_waste_categories','site_info']));
        } elseif(Session::get('user_role') == 'buyer'){
            return view('welcomeBuyer', compact(['sub_waste_categories','site_info']));            
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
        
        $sub_waste_categories = Sub_waste_category::take(6)->get();
        $site_info = Site_information::where('type', 1)->orderBy('created_at','desc')->take(5)->get();
        return view('welcomeGuest', compact(['sub_waste_categories', 'site_info']));
    }
}
