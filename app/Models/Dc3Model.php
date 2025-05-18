<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dc3Model extends Model
{
    protected $connection = 'DC3';
    protected $table = 'Dc3';
    protected $fillable = ['dc',];
}
