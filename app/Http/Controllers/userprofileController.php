<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\user;
use App\Buyer;
use App\Seller;




class userprofileController extends Controller
{
    public function profileInfo($id)
    {
        $common_user_info = User::find($id);
        if ($common_user_info->_usertype == 'buyer'){
            $specific_user_info = Buyer::where('user_id', $common_user_info->id)->first();
        }elseif ($common_user_info->_usertype == 'seller'){
            $specific_user_info = Seller::where('user_id', $common_user_info->id)->first();
        }elseif ($common_user_info->_usertype == 'buyer/seller'){
            if (Session::has('user_role')){
                if (Session::get('user_role') == 'buyer'){
                    $specific_user_info = Buyer::where('user_id', $common_user_info->id)->first();
                } elseif (Session::get('user_role') == 'seller'){
                    $specific_user_info = Seller::where('user_id', $common_user_info->id)->first();
                }
            }
        }
        return view('profile.info', ['specific_user_info' => $specific_user_info, 'common_user_info'=>$common_user_info]);
    }

    public function profileEdit($id){
        $common_user_info = User::find($id);
        if ($common_user_info->_usertype == 'buyer'){
            $specific_user_info = Buyer::where('user_id', $common_user_info->id)->first();
        }elseif ($common_user_info->_usertype == 'seller'){
            $specific_user_info = Seller::where('user_id', $common_user_info->id)->first();
        }
        elseif ($common_user_info->_usertype == 'buyer/seller'){
            $specific_user_info = Buyer::where('user_id', $common_user_info->id)->first();
        }
        return view('profile.edit', ['specific_user_info' => $specific_user_info, 'common_user_info'=>$common_user_info]);
    }

    public function profileUpdate(Request $request, $id){
    // validation has to be done
        $request->validate([
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'profileType' => 'required',
            'address' => 'required',
            'telephone' => 'required|digits:10',
            'description' => 'nullable',
        ]);

        $table = User::find($id);
        
        // No seller table. So no need of if statement
        // if ($table->_usertype == 'seller'){
        //     // $userId = Seller::select('id')->where('user_id', $id)->first();
            
        //     $user = User::find($id);
            
        // } elseif ($table->_usertype == 'buyer') {
        //     // $userId = Buyer::select('id')->where('user_id', $id)->first();
        //     $user = User::find($id);
        // }

        $user = User::find($id);


        // $table->email = $request->input('email');
        // $table->password = bcrypt($request->input('password'));

        // should be added after fixing login
        // $table->_usertype = $request->input('profileType');
        // $table->save();

        // $user = user::find($userId);
        $user->first_name = $request->input('firstName');
        $user->last_name = $request->input('lastName');
        $user->_usertype = $request->input('profileType');
        $user->address = $request->input('address');
        $user->phone = $request->input('telephone');
        $user->description = $request->input('description');

        $user->save();

        return redirect()->to('/profile/' . $id)->with('success', 'Successfully updated profile information');
    }


    public function viewUsersByCategory(){
        if(auth()->user()->_usertype == "seller"){
            $buyers =  DB::table('buyer')->join('user','user.id', '=', 'buyer.user_id')
                ->where('user.id','!=',auth()->user()->id)
                ->select('user.first_name as first_name','user.last_name as last_name','user.email as email','user.phone as phone' ,'user.address as address' , 'buyer.type as type' , 'buyer.website as website', 'buyer.rating as rating', 'user.created_at as created_at','buyer.user_id as user_id','user.id as id','buyer.id as buyer_id','buyer.no_of_raters as no_of_raters')
                ->get();;

            return view('viewUser')->with('users',$buyers)->withTitle('Buyer Details');


        }elseif (auth()->user()->_usertype == "buyer"){
            $sellers = user::all();

            return view('viewUser')->with('users',$sellers)->withTitle('Seller Details');

        }else{
            if(Session::has('user_role')) {
                if (Session::get('user_role') == 'seller') {
                    $buyers =  DB::table('buyer')->join('user','user.id', '=', 'buyer.user_id')
                        ->where('user.id','!=',auth()->user()->id)
                        ->select('user.first_name as first_name','user.last_name as last_name','user.email as email','user.phone as phone' ,'user.address as address' , 'buyer.type as type' , 'buyer.website as website', 'buyer.rating as rating', 'user.created_at as created_at','buyer.user_id as user_id','user.id as id','buyer.id as buyer_id','buyer.no_of_raters as no_of_raters')
                        ->get();

//                    $rating = new willvincent\Rateable\Rating;
//                    $rating->rating = $buyers->rating;

//                    $calculatedRates = ($rates->rating)/($rates->no_of_raters);

                    return view('viewUser')->with(['users'=> $buyers])->withTitle('Buyer Details');

                }elseif(Session::get('user_role') == 'buyer'){
                    $sellers = user::all()
                        ->where('id','!=',auth()->user()->id);

                    return view('viewUser')->with('users',$sellers)->withTitle('Seller Details');

                }
                                }
        }

    }




    public function rateBuyers(Request $request, $id)

    {
        $prev_ratings = DB::table('buyer')
                            ->select('rating')
                            ->where('id', $id)->first();
        $prev_raters = DB::table('buyer')
                        ->select('no_of_raters')
                        ->where('id', $id)->first();
        $new_rating = $prev_ratings->rating + $request->rating;
        $new_raters = $prev_raters->no_of_raters + 1;
//        $buyer->rating

        DB::table('buyer')
            ->where('id', $id)
            ->update(['rating' => $new_rating , 'no_of_raters' => $new_raters]);

        return redirect()->to('/viewUsersByCategory')->with('success','You have rated successfully.');

    }


}


