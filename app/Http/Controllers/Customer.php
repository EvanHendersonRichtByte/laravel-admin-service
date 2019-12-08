<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggan;
class Customer extends Controller
{
    public function index(){
    	$data["customers"] = pelanggan::all();
    	return view("customer",$data);
    }
    public function save(Request $request){
    	$action = $request->action;
    	if ($action == "insert") {
    		$pelanggan = new pelanggan();
    		$pelanggan->id_pelanggan = $request->id_pelanggan;
    		$pelanggan->nama_pelanggan = $request->nama_pelanggan;
    		$pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
    		$pelanggan->save();
    	} else if ($action == "update") {
    		$pelanggan = pelanggan::where("id_pelanggan",$request->id_pelanggan)->first();
    		$pelanggan->id_pelanggan = $request->id_pelanggan;
    		$pelanggan->nama_pelanggan = $request->nama_pelanggan;
    		$pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
    		$pelanggan->save();
    	}
    	return redirect("customer")->with("message","Data berhasil disimpan!");
    }
     public function delete($id_pelanggan){
    pelanggan::where("id_pelanggan",$id_pelanggan)->delete();
    return redirect("customer")->with("message","Data berhasil dihapus!");
    }
    public function __construct(){
        $this->middleware("check_login");
    }
}
