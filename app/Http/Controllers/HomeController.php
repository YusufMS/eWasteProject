<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\main_waste_category;

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
        return view('home');
    }
    public function buyerIndex()
    {
        return view('buyer.home');
    }
    public function sellerIndex()
    {
        $main_categories = main_waste_category::take(6)->get();
        return view('seller.index', compact(['main_categories']));
    }

    public function guestIndex()
    {
        
        $main_categories = main_waste_category::take(6)->get();
        return view('welcomeIndex', compact(['main_categories']));
    }
}
