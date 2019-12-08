<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
// memanggil file model mobil.php

class Api_mobil extends Controller
{
    public function index()
    {
    	$data["first_name"] = "King";
    	$data["last_name"] = "Lion";
    	$data["message"] = "Selamat Belajar Rest API Laravel";
    	return response($data);
    	// response digunakan untuk generate data ke bentuk JSON
    }

    public function get_mobil()
    {
    	$data["mobil"] = Mobil::all();
    	return response($data);
    }

    public function send_data(Request $request)
    {
        //menangkap request dari user
        $data["nomor_mobil"] = $request->nomor_mobil;
        $data["nomor_mobil"] = $request->nomor_mobil;
        $data["jenis"] = $request->jenis;

        // memberi response ke user
        $response["nomor_mobil"] = $data["nomor_mobil"]."".$data["nomor_mobil"];
        $response["jenis"] = $data["jenis"];
        return response($response);
    }

    public function save_mobil(Request $request)
    {
        //catch the request from user
        $id_mobil = $request->id_mobil;
        $nomor_mobil = $request->nomor_mobil;
        $jenis = $request->jenis;
        $merk = $request->merk;
        $tahun_pembuatan = $request->tahun_pembuatan;
        $biaya_sewa_per_hari = $request->biaya_sewa_per_hari;
        $image = $request->image;

        $id_mobil = $request->id_mobil;
        $nomor_mobil = $request->nomor_mobil;
        $jenis = $request->jenis;
        $merk = $request->merk;
        $tahun_pembuatan = $request->tahun_pembuatan;
        $biaya_sewa_per_hari = $request->biaya_sewa_per_hari;
        $image = $request->image;
        $count = mobil::where("id_mobil","$id_mobil")->count();
        // untuk ngecek ada tidak datanya
        if ($count > 0){
            // update data
        $mobil = mobil::where("id_mobil", $id_mobil)->first();
        $mobil->id_mobil = $request->id_mobil;
        $mobil->nomor_mobil = $request->nomor_mobil;
        $mobil->jenis = $request->jenis;
        $merk = $request->merk;
        $tahun_pembuatan = $request->tahun_pembuatan;
        $biaya_sewa_per_hari = $request->biaya_sewa_per_hari;
        $image = $request->image;
        $mobil->save();
        $response = ["message" => "Data berhasil diubah"];
        }else{
        // insert data
        $mobil = new mobil();
        $mobil->id_mobil = $request->id_mobil;
        $mobil->nomor_mobil = $request->nomor_mobil;
        $mobil->merk = $request->merk;
        $mobil->jenis = $request->jenis;
        $mobil->tahun_pembuatan = $request->tahun_pembuatan;
        $mobil->biaya_sewa_per_hari = $request->biaya_sewa_per_hari;
        $mobil->image = $request->image;
        $mobil->save();
        $response = ["message" => "Data berhasil ditambahkan"];
        }
        return response($response);
    }
}