<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserValidation extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nip','nama','ruang_baca'];
}
