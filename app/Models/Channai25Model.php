<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channai25Model extends Model
{
    protected $connection = 'csk25';
    protected $table = 'channai25';
    protected $fillable = ['name','age',];
}
