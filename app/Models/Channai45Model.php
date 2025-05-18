<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai45Model extends Model
{
    protected $connection = 'csk45';
    protected $table = 'channai45';
    protected $fillable = ['name',];
}
