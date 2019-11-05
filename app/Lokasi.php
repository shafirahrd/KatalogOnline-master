<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $primaryKey = 'id_lokasi';
    public $incrementing = true;
    protected $fillable = ['departemen','fakultas','alamat','tautan'];

    public function lokasi(){
    	return $this->hasMany('App\Lokasi','lokasi','id_lokasi');
    }

    public function user_lokasi(){
    	return $this->belongsTo('App\User','user_lokasi');
    }
}
