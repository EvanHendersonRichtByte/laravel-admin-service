<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Karyawan;
class Login extends Controller
{
    public function index() {
    	return view("login");
    }
    public function check(Request $request){
    	$username = $request->username;
    	$password = $request->password;

    	$data = Karyawan::where("username",$username)->where("password",md5($password));
    	if ($data->count() >0){
    		Session::put("logged_in",true);
    		Session::put("Karyawan",$data->first());
    		return redirect("employee");
    	} else {
    		return redirect("login")->with("message","Username/Password Salah");
    	}
    }
    
    public function logout(){
    	Session::flush();
    	// sama seperti session_destroy()
    	return redirect("/check_login");
    }
}
