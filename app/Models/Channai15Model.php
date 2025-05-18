<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai15Model extends Model
{
    protected $connection = 'csk15';
    protected $table = 'channai15';
    protected $fillable = ['name',];
}
