<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai3Model extends Model
{
    protected $connection = 'csk3';
    protected $table = 'channai3';
    protected $fillable = ['name','age',];
}
