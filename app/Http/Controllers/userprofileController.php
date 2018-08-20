<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\User;
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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'profileType' => 'required',
            'address' => 'required',
            'telephone' => 'digits:10',
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
}


