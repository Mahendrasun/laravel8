<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    //


    public function ChangePassword(){

        return view('admin.body.change_password');

    }


    public function UpdatePassword(Request $request){

        $validateDate = $request->validate([
                'oldpassword'=>'required',
                'password'=>'required|confirmed'

        ]);
$hasedPassword = Auth::user()->password;
if(Hash::check($request->oldpassword,$hasedPassword)){
    $user = User::find(Auth::id());
    $user->password = Hash::make($request->password);
    $user->save();
    Auth::logout();
    return redirect()->route('login')->with('success','Password Changed Successfully');

}else{
    return redirect()->back()->with('error','Current Password in incorrect');
}


    }

public function UpdateProfile(){

if(Auth::user()){
$user = User::find(Auth::user()->id);

if($user){


    return view('admin.body.update_profile',compact('user',));
}

}

}


public function Updateuser(Request $request){

$user = User::find(Auth::user()->id);
if($user){

$user->name = $request->name;
$user->email = $request->email;

$user->save();

return redirect()->back()->with('success','user profile is Updated Successfully');


}else{

  return redirect()->back();
}


}

}
