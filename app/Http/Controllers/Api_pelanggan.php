<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
// memanggil file model mobil.php

class Api_pelanggan extends Controller
{
    public function index()
    {
    	$data["first_name"] = "King";
    	$data["last_name"] = "Lion";
    	$data["message"] = "Selamat Belajar Rest API Laravel";
    	return response($data);
    	// response digunakan untuk generate data ke bentuk JSON
    }

    public function get_pelanggan()
    {
    	$data["pelanggan"] = Pelanggan::all();
    	return response($data);
    }

    public function send_data(Request $request)
    {
        //menangkap request dari user
        $data["nama"] = $request->nama;
        $data["nama_belakang"] = $request->nama_belakang;
        $data["alamat"] = $request->alamat;

        // memberi response ke user
        $response["nama_lengkap"] = $data["nama_depan"]."".$data["nama_belakang"];
        $response["alamat"] = $data["alamat"];
        return response($response);
    }

    public function save_pelanggan(Request $request)
    {
        //catch the request from user
        $id_pelanggan = $request->id_pelanggan;
        $nama = $request->nama;
        $alamat = $request->alamat;

        $id_pelanggan = $request->id_pelanggan;
            $nama_pelanggan = $request->nama_pelanggan;
        $alamat_pelanggan = $request->alamat_pelanggan;
        $kontak = $request->kontak;
        $username = $request->username;
            $password = $request->password;

        $count = Pelanggan::where("id_pelanggan","$id_pelanggan")->count();
        // untuk ngecek ada tidak datanya
        if ($count > 0){
            // update data
            $pelanggan = Pelanggan::where("id_pelanggan", $id_pelanggan)->first();
            $pelanggan->id_pelanggan = $request->id_pelanggan;
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $pelanggan->kontak = $request->kontak;
        $pelanggan->username = $request->username;
            $pelanggan->password = $request->password;
            $pelanggan->save();
            $response = ["message" => "Data berhasil diubah"];
            }else{
            // insert data
            $pelanggan = new Pelanggan();
            $pelanggan->id_pelanggan = $request->id_pelanggan;
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $pelanggan->kontak = $request->kontak;
        $pelanggan->username = $request->username;
            $pelanggan->password = $request->password;
            $pelanggan->save();
            $response = ["message" => "Data berhasil ditambahkan"];
            }
            return response($response);
    }
}