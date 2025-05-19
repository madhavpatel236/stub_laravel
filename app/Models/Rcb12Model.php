<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rcb12Model extends Model
{
    protected $connection = 'rcb12';
    protected $table = 'rcb12';
    protected $fillable = ['a','b',];
}
