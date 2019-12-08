<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
// memanggil file model mobil.php

class Api_karyawan extends Controller
{
    public function index()
    {
    	$data["first_name"] = "King";
    	$data["last_name"] = "Lion";
    	$data["message"] = "Selamat Belajar Rest API Laravel";
    	return response($data);
    	// response digunakan untuk generate data ke bentuk JSON
    }

    public function get_karyawan()
    {
    	$data["karyawan"] = Karyawan::all();
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

    public function save_karyawan(Request $request)
    {
        //catch the request from user
        $id_karyawan = $request->id_karyawan;
        $nama = $request->nama;
        $alamat = $request->alamat;

        $id_karyawan = $request->id_karyawan;
            $nama_karyawan = $request->nama_karyawan;
        $alamat_karyawan = $request->alamat_karyawan;
        $kontak = $request->kontak;
        $username = $request->username;
            $password = $request->password;

        $count = Karyawan::where("id_karyawan","$id_karyawan")->count();
        // untuk ngecek ada tidak datanya
        if ($count > 0){
            // update data
            $karyawan = Karyawan::where("id_karyawan", $id_karyawan)->first();
            $karyawan->id_karyawan = $request->id_karyawan;
            $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->alamat_karyawan = $request->alamat_karyawan;
        $karyawan->kontak = $request->kontak;
        $karyawan->username = $request->username;
            $karyawan->password = $request->password;
            $karyawan->save();
            $response = ["message" => "Data berhasil diubah"];
            }else{
            // insert data
            $karyawan = new Karyawan();
            $karyawan->id_karyawan = $request->id_karyawan;
            $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->alamat_karyawan = $request->alamat_karyawan;
        $karyawan->kontak = $request->kontak;
        $karyawan->username = $request->username;
            $karyawan->password = $request->password;
            $karyawan->save();
            $response = ["message" => "Data berhasil ditambahkan"];
            }
            return response($response);
    }
}