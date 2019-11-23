<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class csvdata extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['csv_filename','csv_header','csv_data'];
}
