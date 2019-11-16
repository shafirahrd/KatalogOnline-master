<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class katalog extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_katalog';
    public $incrementing = true;
    protected $fillable = ['judul','jenis','penulis','penerbit','kota_penerbit','tahun_terbit','bahasa','deskripsi','lokasi','foto','att_value'];
    protected $casts = ['att_value' => 'array'];

    public function lokasis(){
    	return $this->belongsTo('App\Lokasi','lokasi','id_lokasi');
    }

    public function koleksi(){
    	return $this->belongsTo('App\Koleksi','jenis','id_koleksi');
    }
    public function log(){
        return $this->hasMany('App\Log','id_katalog','id_katalog');
    }
    public function getFormattedValueAttribute(){
        return json_decode($this->att_value);
    }
}
