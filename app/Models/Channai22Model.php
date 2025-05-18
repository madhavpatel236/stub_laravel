<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai22Model extends Model
{
    protected $connection = 'csk22';
    protected $table = 'channai22';
    protected $fillable = ['name','age',];
}
