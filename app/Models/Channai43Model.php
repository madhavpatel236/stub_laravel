<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai43Model extends Model
{
    protected $connection = 'csk43';
    protected $table = 'channai43';
    protected $fillable = ['age',];
}
