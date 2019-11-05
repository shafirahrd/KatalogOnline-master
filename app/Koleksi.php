<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class koleksi extends Model
{
    protected $primaryKey = 'id_koleksi';
    public $incrementing = true;
    protected $fillable = ['jenis_koleksi','deskripsi_koleksi'];
    protected $casts = ['att_khusus'];

    public function koleksi(){
    	return $this->hasMany('App\Koleksi','jenis','id_koleksi');
    }
}
