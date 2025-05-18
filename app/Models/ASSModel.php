<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ASSModel extends Model
{
    protected $connection = 'ASS';
    protected $table = 'ASS';
    protected $fillable = ['ASS',];
}
