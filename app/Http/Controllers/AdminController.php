<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Buyer;
use App\Seller;
use App\Complain;
use App\Site_information;
use App\Main_waste_category;
use App\Sub_waste_category;
use App\post;
use App\Buyer_Post;
use App\Seller_Post;
use Auth;
use Charts;
use DB;

class AdminController extends Controller
{
    
public function index(){
 
	return view('admin.adminPage');




}


public function adminProfile(){
  
	return view('admin.adminProfile');


}

/*
public function addNews(){
  
	return view('admin.addNews');


}  */


public function addCategory(){

	$maincategories = main_waste_category::all();

	return view('admin.addCategory')->with('maincategories',$maincategories)->withTitle('MainCategories');

}

public function viewBuyers(){

	$buyers = buyer::all();
  
	return view('admin.viewBuyers')->with('users',$buyers)->withTitle('Buyer Details');


}

public function viewSellers(){

    $users = user::all()->where('_usertype',"seller");

    return view('admin.viewSellers')->with('users',$users)->withTitle('Seller Details');


}

public function viewUsers(){

	$users = user::all();
	$buyers = buyer::all();
	$sellers = user::all()->where('_usertype',"seller");
  
	return view('admin.viewUsers')->with('sellers',$sellers)->with('buyers',$buyers)->withTitle('User Details');

}


public function viewReportedPosts(){

    $complains = Complain::all();
    //dd($complains);
    $users = User::all();
    return view('admin.reportedPosts')->with(['complains'=>$complains, 'users' => $users])->withTitle('Complains');


}

// public function viewPosts(){

  
//     return view('admin.viewPosts');


// }


    public function viewPosts($id)
    {
        $post = post::findOrFail($id);
        $seller = user::findOrFail($post->publisher_id);

        
        if ($post->publisher_id != auth()->user()->id) {
            $post->increment('view_count');
        }

        return view('admin.reportedPosts', ['post' => $post, 'seller' => $seller]);
    }


public function viewNews(){

    $news = Site_information::all();

    return view('admin.addNews')->with('news',$news)->withTitle('Site Informations');


}



public function configurations(){
  
	return view('admin.configurations');


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

public function addMainCategory(Request $request){


		 // input validations
        $this->validate($request, [
            'maincategory' => 'required'
            
        ]);


        $maincategory = new Main_waste_category();

        $maincategory->main_category = $request->input('maincategory');
        $maincategory->save();

        return redirect()->back()->with('success','Successfully added.');



	}


public function addSubCategory(Request $request){

		 // input validations
        $this->validate($request, [
            'subcategory' => 'required',
            'description' => 'required',
            'maintype' => 'required'
            
        ]);


		$subcategory = new Sub_waste_category();


		$subcategory->category = $request->input('subcategory');
		$subcategory->description = $request->input('description');
		$subcategory->main_category_id = $request->input('maintype');

		$subcategory->save();

        return redirect()->back()->with('success','Successfully added.');


	}



public function deleteSeller($id){

		$seller = user::find($id);
		$seller->delete();

		return redirect()->back()->with('success','Successfully deleted.');


	}

public function deleteBuyer($id){

		$buyer = buyer::find($id);
		$buyer->delete();

		return redirect()->back()->with('success','Successfully deleted.');


	}


public function deleteNews($id){

		$delnews = Site_information::find($id);
		$delnews->delete();

		return redirect()->back()->with('success','Successfully deleted.');


	}

public function deleteMainWasteCategory($id){

		$delmain = Main_waste_category::find($id);
		$delmain->delete();

		return redirect()->back()->with('success','Successfully deleted.');


	}
public function deleteSubWasteCategory($id){

		$delsub = Sub_waste_category::find($id);
		$delsub->delete();

		return redirect()->back()->with('success','Successfully deleted.');


	}	

public function deletePost($id){

		$deletepost = Sub_waste_category::find($id);
		$deletepost->delete();

		return redirect()->back()->with('success','Successfully deleted.');


	}	




public function updateSiteInformations(Request $request, $id){

 		// input validations
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);



        $upinfo = Site_information::find($id);

        $upinfo->title = $request->input('title');
        $upinfo->description = $request->input('description');
        $upinfo->type = $request->input('type');
        $upinfo->save();

       return redirect()->back()->with('success','Successfully updated.');

       
    }


public function chartUsers(){

	$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart1 = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Registered Users")
			      ->elementLabel("Total Number of Users")
			      ->dimensions(100, 400)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);



	$posts = Post::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart2 = Charts::database($posts, 'bar', 'highcharts')
			      ->title("User Posts Evaluation")
			      ->elementLabel("Total Number of Posts")
			      ->dimensions(100, 400)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);




	
	$sellers = user::all()->where('_usertype',"seller");
	$sellercount = $sellers->count();	

	$buyers = user::all()->where('_usertype',"buyer");
	$buyercount = $buyers->count();

	$buyersellers = user::all()->where('_usertype',"buyer/seller");
	$buyersellercount = $buyersellers->count();


	$chart3  = Charts::create('pie', 'highcharts')
    			->title('All System Users')
    			->labels(['Sellers', 'Buyers', 'Both Buyers/Sellers'])
   				->values([$sellercount,$buyercount,$buyersellercount])
    			->dimensions(1000,500)
    			->responsive(true);



    $data = [
    'chart1'  => $chart1,
    'chart2'   => $chart2,
    'chart3' => $chart3

	];











	//return view('admin.adminPage',compact('chart'));
    //return view('admin.adminPage', ['chart1' => $chart1],['chart2' => $chart2]);
	return view('admin.adminPage', $data);

	}









/**
public function viewMainCategories(){

	 $maincategories = main_waste_category::all();
  
	 return view('admin.addCategory')->with('maincategories',$maincategories)->withTitle('MainCategories');

}
***/

}
