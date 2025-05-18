<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai18Model extends Model
{
    protected $connection = 'csk18';
    protected $table = 'channai18';
    protected $fillable = ['name','age',];
}
