<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buyer;
use App\Seller;
use App\Site_information;

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


public function addCategory(){
  
	return view('admin.addCategory');


}

public function viewBuyers(){

	$buyers = buyer::all();
  
	return view('admin.viewBuyers')->with('users',$buyers)->withTitle('Buyer Details');


}

public function viewSellers(){

    $users = user::all()->where('_usertype',"seller");

    return view('admin.viewSellers')->with('users',$users)->withTitle('Seller Details');


}



public function configurations(){
  
	return view('admin.addCategory');


}

public function viewUsers(){

	$users = user::all();
  
	return view('admin.viewUsers')->with('users',$users)->withTitle('User Details');

}


public function addSiteInformations(Request $request){

 // input validations
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);



        $info = new Site_information();

        $info->title = $request->input('title');
        $info->description = $request->input('description');
        $info->type = $request->input('type');
        $info->save();

       return redirect()->back()->with('success','Successfully added.');

       
    }







}
