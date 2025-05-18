<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai19Model extends Model
{
    protected $connection = 'csk19';
    protected $table = 'channai19';
    protected $fillable = ['name',];
}
