<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FfModel extends Model
{
    protected $connection = 'ff';
    protected $table = 'ff';
    protected $fillable = ['f','ff','fff',];
}
