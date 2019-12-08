<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $primaryKey = "id_transaksi";
    protected $fillable = ["id_transaksi","id_pelanggan","id_karyawan","tgl_layanan"];

    public $incrementing = false;
// biar primary key dapat diisi dengan karakter

    function karyawan(){
    	return $this->belongsTo('App\Karyawan','id_karyawan');
    	//untuk merelasikan ke file model karyawan dengan foreign key id_karyawan
    }

    function detail_transaksi(){
    	return $this->hasMany('App\Detail_transaksi','id_transaksi',"id_transaksi");
    	//untuk merelasikan ke file model karyawan dengan foreign key id_layanan
    }

    function pelanggan(){
    	return $this->belongsTo('App\Pelanggan','id_pelanggan');
    	//untuk merelasikan ke file model karyawan dengan foreign key id_pelanggan
    }

}
