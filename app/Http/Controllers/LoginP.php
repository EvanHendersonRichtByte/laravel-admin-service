<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Pelanggan;
class Loginp extends Controller
{
    public function index() {
    	return view("loginp");
    }
    public function check(Request $request){
    	$username = $request->username;
    	$password = $request->password;

    	$data = Pelanggan::where("username",$username)->where("password",md5($password));
    	if ($data->count() >0){
    		Session::put("logged_in",true);
    		Session::put("Pelanggan",$data->first());
    		return redirect("rent");
    	} else {
    		return redirect("loginP")->with("message","Username/Password Salah");
    	}
    }
    
    public function logout(){
    	Session::flush();
    	// sama seperti session_destroy()
    	return redirect("/check_login");
    }
}
