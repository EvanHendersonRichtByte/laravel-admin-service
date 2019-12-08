<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    protected $table = "detail_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $fillable = ["id_transaksi","id_layanan","biaya_layanan"];

    public $incrementing = false;
	//agar primary key dapat diisi dengan karakter
	public function layanan(){
		return $this->belongsTo("App\Layanan","id_layanan");
	}
}
