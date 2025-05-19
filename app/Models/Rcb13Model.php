<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rcb13Model extends Model
{
    protected $connection = 'rcb13';
    protected $table = 'rcb13';
    protected $fillable = ['a','b',];
}
