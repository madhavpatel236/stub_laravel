<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai14Model extends Model
{
    protected $connection = 'csk14';
    protected $table = 'channai14';
    protected $fillable = ['name',];
}
