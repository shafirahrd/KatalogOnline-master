<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katalog extends Model
{
    protected $primaryKey = 'id_katalog';
    public $incrementing = true;
    protected $fillable = ['judul','jenis','penulis','penerbit','kota_penerbit','tahun_terbit','bahasa','deskripsi','lokasi','att_value'];
}
