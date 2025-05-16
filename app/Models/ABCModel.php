<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ABCModel extends Model
{
    protected $connection = 'ABC';
    protected $table = 'ABC';
    protected $fillable = [
        'Name'
    ];
}
