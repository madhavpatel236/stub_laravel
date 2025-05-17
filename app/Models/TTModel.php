<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TTModel extends Model
{
    protected $connection = 'TT';
    protected $table = 'TT';
    protected $fillable = ['TT','TTT',];
}
