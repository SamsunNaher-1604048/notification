<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserNotification;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    function userreg(){
        return view('registation'); 
    }

    function userauth(){
        return view('login');

    }

    function regstore(Request $req){
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('user.login');
    }

    function userauthmatch(Request $req){
       
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return "hello";
        }
  
        return redirect("login");

    }

    function notify(){

    if(Auth::user()){
         $user = User::find(1);
        //Auth::user()->notify(new UserNotification($user));
        Notification::send(Auth::user(), new UserNotification($user));
        }
  
    }
}
