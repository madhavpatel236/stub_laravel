<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test_table2Model extends Model
{
    protected $connection = 'test2';
    protected $table = 'test_table2';
}
