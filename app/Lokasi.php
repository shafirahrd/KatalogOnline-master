<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class lokasi extends Model
{
	use Sortable;
	
    protected $primaryKey = 'id_lokasi';
    public $incrementing = true;
    protected $fillable = ['departemen','fakultas','alamat','tautan'];

    public function lokasi(){
    	return $this->hasMany('App\Lokasi','id_lokasi','lokasi');
    }

    public function user_lokasi(){
    	return $this->belongsTo('App\User','user_lokasi');
    }
}
