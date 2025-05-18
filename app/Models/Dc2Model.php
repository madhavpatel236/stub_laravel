<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dc2Model extends Model
{
    protected $connection = 'DC2';
    protected $table = 'Dc2';
    protected $fillable = ['dc',];
}
