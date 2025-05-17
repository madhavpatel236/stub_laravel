<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MnmModel extends Model
{
    protected $connection = 'mnm';
    protected $table = 'mnm';
    protected $fillable = ['mnm,'];
}
