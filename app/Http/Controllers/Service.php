<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\layanan;

class Service extends Controller
{
    public function index(){
    	$data["service"] = layanan::all(); //load data from database
        $data["service"] = layanan::paginate(); //load data from database
    	return view("layanan",$data); //direct to view layanan brings data
    }
    public function save(Request $request){
    	try {
    		$action = $request->action;
    		if ($action == "insert") {
    			$layanan = new layanan(); //insurance new object
    			$file = $request->image; // get uploaded file
    			$layanan->id_layanan = $request->id_layanan;
                $layanan->nama_layanan = $request->nama_layanan;
    			$layanan->biaya_layanan = $request->biaya_layanan;
                $fileName = $request->id_layanan."-".time().".".$file->extension();
                $layanan->image = $fileName;
                $layanan->save(); //save data to database
                $file->storeAs('public/cover_layanan',$fileName);
    		}   elseif ($action == "update") {
                $layanan = layanan::where("id_layanan",$request->id_layanan)->first(); //get data based on id_layanan
                if ($request->hasFile("image")) {
                    // jika membawa data gambar
                    $path = public_path('storage/cover_layanan/'.$layanan->image);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                    $file = $request->image; //get uploaded file
                    $fileName = $request->id_layanan."-".time().".".$file->extension();
                    $layanan->image = $fileName;
                    $file->storeAs('public/cover_layanan',$fileName);
                }
                $file = $request->image; // get uploaded file
                $layanan->id_layanan = $request->id_layanan;
                $layanan->nama_layanan = $request->nama_layanan;
                $layanan->biaya_layanan = $request->biaya_layanan;
                $layanan->save(); //save data to database
            }
            return redirect("service")->with("message","Data berhasil disimpan!");
    	} catch (\Exception $e) {
            return redirect("service")->with("message",$e->getMessage());
        }
    }
    public function delete($id_layanan){
        try {
            $layanan = layanan::where("id_layanan",$id_layanan)->first();
            $path = public_path('storage/cover_layanan'.$layanan->image);
            if (file_exists($path)) {
                unlink($path);
            }
            layanan::where("id_layanan",$id_layanan)->delete();
            return redirect("service")->with("message","Data berhasil dihapus!");
        } catch (\Exception $e) {
            return redirect ("service")->with("message",$e->getMessage());
        }
    }
    // public function search(Request $request){

    //     $data["services"] = layanan::where("id_layanan","like","%$request->search%")
    //     ->orwhere("nomor_layanan","like","%request->search%")
    //     ->orwhere("merk","like","%request->search%")
    //     ->orwhere("jenis","like","%request->search%")->paginate(4);

    //     $data["count"] = layanan::where("id_layanan","like","%$request->search%")
    //     ->orwhere("nomor_layanan","like","%request->search%")
    //     ->orwhere("merk","like","%request->search%")
    //     ->orwhere("jenis","like","%request->search%")->count();

    //     return view("layanan","$data");
    // }
    public function __construct(){
        $this->middleware("check_login");
    }
}
