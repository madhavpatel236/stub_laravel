<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai41Model extends Model
{
    protected $connection = 'csk41';
    protected $table = 'channai41';
    protected $fillable = ['name',];
}
