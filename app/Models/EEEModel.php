<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EEEModel extends Model
{
    protected $connection = 'EEE';
    protected $table = 'EEE';
    protected $fillable = ['E',];
}
