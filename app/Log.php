<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    protected $primaryKey = 'id_log';
    public $incrementing = true;
    protected $fillable = ['id_uname','log_change'];

    public function log(){
    	return $this->hasMany('App\User','username','id_uname');
    }
}
