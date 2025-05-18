<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai23Model extends Model
{
    protected $connection = 'csk23';
    protected $table = 'channai23';
    protected $fillable = ['name','age',];
}
