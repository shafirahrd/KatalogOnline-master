<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['role'];
}
