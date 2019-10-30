<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class koleksi extends Model
{
    protected $primaryKey = 'id_koleksi';
    public $incrementing = true;
    protected $fillable = ['jenis_koleksi','deskripsi_koleksi','att_khusus'];
}
