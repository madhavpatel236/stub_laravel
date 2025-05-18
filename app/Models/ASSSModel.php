<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ASSSModel extends Model
{
    protected $connection = 'ASSS';
    protected $table = 'ASSS';
    protected $fillable = ['ASS',];
}
