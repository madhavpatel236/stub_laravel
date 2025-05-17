<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VModel extends Model
{
    protected $connection = 'v';
    protected $table = 'v';
    protected $fillable = ['v','vv',];
}
