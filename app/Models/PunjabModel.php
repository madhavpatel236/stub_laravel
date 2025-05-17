<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PunjabModel extends Model
{
    protected $connection = 'Pbks';
    protected $table = 'punjab';
    protected $fillable = ['a','b','c',];
}
