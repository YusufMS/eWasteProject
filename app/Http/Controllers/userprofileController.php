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
        $userlog = User::find($id);
        if ($userlog->_usertype == 'buyer'){
            $user = Buyer::where('user_id', $userlog->id)->first();
        }elseif ($userlog->_usertype == 'seller'){
            $user = Seller::where('user_id', $userlog->id)->first();
        }
        return view('profile.info', ['user' => $user, 'userlog'=>$userlog]);
    }

    public function profileEdit($id){
        $userlog = User::find($id);
        if ($userlog->_usertype == 'buyer'){
            $user = Buyer::where('user_id', $userlog->id)->first();
            return $user;
        }elseif ($userlog->_usertype == 'seller'){
            $user = Seller::where('user_id', $userlog->id)->first();
        }
        return view('profile.edit', ['user' => $user, 'userlog'=>$userlog]);
    }

    public function profileUpdate(Request $request, $id){
            $table = User::find($id);

            if ($table->_usertype == 'seller'){
                $userId = Seller::select('id')->where('user_id', $id)->first();
                $user = Seller::find($userId->id);
                
            } elseif ($table->_usertype == 'buyer') {
                $userId = Buyer::select('id')->where('user_id', $id)->first();
                $user = Buyer::find($userId);
            }

            // $table->email = $request->input('email');
            // $table->password = bcrypt($request->input('password'));

            // should be added after fixing login
            // $table->_usertype = $request->input('profileType');
            // $table->save();

            // $user = user::find($userId);
            $user->name = $request->input('name');
            $user->address = $request->input('address');
            $user->phone = $request->input('telephone');
            $user->description = $request->input('description');

            $user->save();

            return redirect()->to('/profile/' . $id)->with('success', 'Successfully updated profile information');
    }
}


