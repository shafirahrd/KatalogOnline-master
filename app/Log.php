<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class log extends Model
{
	use Sortable;
	
    protected $primaryKey = 'id_log';
    public $incrementing = true;
    protected $fillable = ['id_user','log_change','id_katalog'];

    // public function user(){
    // 	return $this->belongsTo('App\User','id_user');
    // }

    public function katalog(){
    	return $this->belongsTo('App\Katalog','id_katalog');
    }
}
