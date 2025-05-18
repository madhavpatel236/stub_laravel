<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai8Model extends Model
{
    protected $connection = 'csk8';
    protected $table = 'channai8';
    protected $fillable = ['age',];
}
