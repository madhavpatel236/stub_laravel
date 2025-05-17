<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PakModel extends Model
{
    protected $connection = 'PAK';
    protected $table = 'pak';
    protected $fillable = ['a',];
}
