<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai21Model extends Model
{
    protected $connection = 'csk21';
    protected $table = 'channai21';
    protected $fillable = ['name','age',];
}
