<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rcb11Model extends Model
{
    protected $connection = 'rcb11';
    protected $table = 'rcb11';
    protected $fillable = ['a','b',];
}
