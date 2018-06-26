<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\buyer;
use App\seller;

class AdminController extends Controller
{
    
public function index(){
 
	return view('admin.adminPage');
}

public function adminProfile(){
  
	return view('admin.adminProfile');


}


public function addNews(){
  
	return view('admin.addNews');


}

public function viewBuyers(){

	$buyers = buyer::all();
  
	return view('admin.viewBuyers')->with('users',$buyers)->withTitle('Buyer Details');


}

    public function viewSellers(){

        $sellers = seller::all();

        return view('admin.viewBuyers')->with('users',$sellers)->withTitle('Seller Details');


    }



public function viewUsers(){

	$users = User::all();
  
	return view('admin.viewUsers')->with('users',$users)->withTitle('User Details');

}










}
