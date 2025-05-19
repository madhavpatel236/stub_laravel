<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lsg1Model extends Model
{
    protected $connection = 'lsg';
    protected $table = 'lsg1';
    protected $fillable = ['name','team',];
}
