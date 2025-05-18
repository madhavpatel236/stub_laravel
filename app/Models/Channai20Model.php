<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai20Model extends Model
{
    protected $connection = 'csk20';
    protected $table = 'channai20';
    protected $fillable = ['name',];
}
