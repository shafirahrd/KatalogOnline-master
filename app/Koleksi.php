<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class koleksi extends Model
{
    use Sortable;
    
    protected $primaryKey = 'id_koleksi';
    public $incrementing = true;
    protected $fillable = ['jenis_koleksi','kode_koleksi','deskripsi_koleksi','att_khusus'];
    protected $casts = ['att_khusus' => 'array'];

    public function koleksi(){
    	return $this->hasMany('App\Koleksi','id_koleksi','jenis');
    }
    public function getFormattedColumnAttribute(){
    	return json_decode($this->att_khusus);
    }
}
