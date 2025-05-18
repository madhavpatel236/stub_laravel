<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai11Model extends Model
{
    protected $connection = 'csk11';
    protected $table = 'channai11';
    protected $fillable = ['age',];
}
