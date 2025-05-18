<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai42Model extends Model
{
    protected $connection = 'csk42';
    protected $table = 'channai42';
    protected $fillable = ['age',];
}
