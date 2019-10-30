<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    protected $primaryKey = 'id_log';
    public $incrementing = true;
    protected $fillable = ['id_uname','log_change'];
}
