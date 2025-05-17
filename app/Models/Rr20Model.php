<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rr20Model extends Model
{
    protected $connection = 'RR20';
    protected $table = 'rr20';
    protected $fillable = ['WE',];
}
