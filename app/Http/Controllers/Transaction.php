<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\Pelanggan;
use App\Karyawan;
use App\Transaksi;
use App\Detail_transaksi;
use Session;

class Transaction extends Controller
{
     public function index(){
     	$data["services"] = Layanan::all();
     	$data["customer"] = Pelanggan::all();
     	return view("transaction",$data);
     }

     public function save(request $request){
     	// $request sama dengan $_POST
     	// fungsi ini digunakan untuk insert data ke tabel transaksi
     	try{
   		$transaksi = new Transaksi(); //transaksi berasal dari model
     	$transaksi->id_transaksi = rand(1,9999).rand(1,9999);
     	$transaksi->id_karyawan = Session::get("Karyawan")->id_karyawan;
     	$transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->tgl_layanan = $request->tgl_layanan;
     	
        
     	$transaksi->save();
        foreach ($request->id_layanan as $id_layanan) {
            $layanan = Layanan::where("id_layanan",$request->id_layanan)->first();
            $biaya = $layanan->biaya_layanan;
            $detail_transaksi = new Detail_transaksi();
            $detail_transaksi->id_transaksi = $transaksi->id_transaksi;
            $detail_transaksi->id_layanan = $id_layanan;
            $detail_transaksi->biaya_layanan = $biaya;
            $detail_transaksi->save();
        }
        

     	return redirect("transaction")->with("message","Berhasil");
     	}catch (\Exception $t){
     	return redirect("transaction")->with("message",$t->getMessage());
     	}
     }
      public function __construct(){
        $this->middleware("check_login");
     }    
      public function report(){
        $data["transaction"] = Transaksi::all();
        return view("report",$data);
     }
    
}