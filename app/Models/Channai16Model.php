<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai16Model extends Model
{
    protected $connection = 'csk16';
    protected $table = 'channai16';
    protected $fillable = ['csk','csk1',];
}
