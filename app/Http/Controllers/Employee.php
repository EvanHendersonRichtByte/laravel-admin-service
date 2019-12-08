<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;
class Employee extends Controller
{
    public function index(){
    	$data["employees"] = karyawan::all();
    	return view("employee",$data);
    }
    public function save(Request $request){
    	$action = $request->action;
    	if ($action == "insert") {
    		$karyawan = new karyawan();
    		$karyawan->id_karyawan = $request->id_karyawan;
    		$karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->nomor = $request->nomor;
            $karyawan->username = $request->username;
    		$karyawan->password = $request->password;
    		$karyawan->save();
    	} else if ($action == "update") {
    		$karyawan = karyawan::where("id_karyawan",$request->id_karyawan)->first();
    		$karyawan->id_karyawan = $request->id_karyawan;
    		$karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->nomor = $request->nomor;
            $karyawan->username = $request->username;
    		$karyawan->password = $request->password;
    		$karyawan->save();
    	}
    	return redirect("employee")->with("message","Data berhasil disimpan!");
    }
     public function delete($id_karyawan){
    karyawan::where("id_karyawan",$id_karyawan)->delete();
    return redirect("employee")->with("message","Data berhasil dihapus!");
    }
    public function __construct(){
        $this->middleware("check_login");
    }
}
