<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IiModel extends Model
{
    protected $connection = 'ii';
    protected $table = 'ii';
    protected $fillable = ['ii','i',];
}
