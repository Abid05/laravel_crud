<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //admin custom logout
    public function logout()
    {
        Auth::logout();
        $notifiaction =['messege'=>'You are logged out!','alert-type'=>'success'];
        return redirect()->route('admin.login')->with($notifiaction);
    }

    //passwod change
    public function passwordChnage(){
        return view('admin.Profile.password_change');
    }
    //Update Password
    public function passwordUpdate(Request $request){

        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $current_pass = Auth::user()->password;
        $old_pass = $request->old_password;
        $new_pass = $request->password;

        if(Hash::check($old_pass,$current_pass)){
            
            $user = User::find(Auth::id());
            $user->password=Hash::make($new_pass);
            $user->save();
            Auth::logout();

            $notifiaction =['messege'=>'Your Password Changed!','alert-type'=>'success'];
            return redirect()->route('admin.login')->with($notifiaction);
        }else{

            $notifiaction =['messege'=>'Old Password Not Matched!','alert-type'=>'error'];
            return redirect()->back()->with($notifiaction);
        }
    }
}
