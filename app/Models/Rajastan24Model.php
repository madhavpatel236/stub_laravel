<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rajastan24Model extends Model
{
    protected $connection = 'RR24';
    protected $table = 'rajastan24';
    protected $fillable = ['rr',];
}
