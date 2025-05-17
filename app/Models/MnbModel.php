<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MnbModel extends Model
{
    protected $connection = 'mnb';
    protected $table = 'mnb';
    protected $fillable = ['mnb,'];
}
