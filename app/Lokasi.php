<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $primaryKey = 'id_lokasi';
    public $incrementing = true;
    protected $fillable = ['departemen','fakultas','alamat','tautan'];
}
