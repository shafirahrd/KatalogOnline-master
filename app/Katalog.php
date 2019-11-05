<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katalog extends Model
{
    protected $primaryKey = 'id_katalog';
    public $incrementing = true;
    protected $fillable = ['judul','jenis','penulis','penerbit','kota_penerbit','tahun_terbit','bahasa','deskripsi','lokasi','foto'];
    protected $casts = ['att_value'];

    public function lokasi(){
    	return $this->belongsTo('App\Lokasi','lokasi','id_lokasi');
    }

    public function koleksi(){
    	return $this->belongsTo('App\Koleksi','jenis','id_koleksi');
    }
}
