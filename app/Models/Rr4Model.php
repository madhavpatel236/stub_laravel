<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rr4Model extends Model
{
    protected $connection = 'rr4';
    protected $table = 'rr4';
    protected $fillable = ['rr',];
}
