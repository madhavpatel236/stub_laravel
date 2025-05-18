<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai24Model extends Model
{
    protected $connection = 'csk24';
    protected $table = 'channai24';
    protected $fillable = ['name','age',];
}
