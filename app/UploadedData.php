<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedData extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['filename','header','data'];
}
