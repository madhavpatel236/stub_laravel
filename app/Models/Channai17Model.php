<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai17Model extends Model
{
    protected $connection = 'csk17';
    protected $table = 'channai17';
    protected $fillable = ['csk','csk2',];
}
