<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MnModel extends Model
{
    protected $connection = 'mn';
    protected $table = 'mn';
    protected $fillable = ['mn,'];
}
