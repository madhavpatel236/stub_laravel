<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai1Model extends Model
{
    protected $connection = 'CSK1';
    protected $table = 'channai1';
    protected $fillable = ['name',];
}
