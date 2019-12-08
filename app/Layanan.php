<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = "layanan";
    protected $primaryKey = "id_layanan";
    protected $fillable = ["id_layanan","nama_layanan","biaya_layanan","image"];

    public $incrementing = false;
    
//agar primary key dapat diisi dengan karakter
}
