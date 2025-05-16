<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test_tableModel extends Model
{
    protected $connection = 'test';
    protected $table = 'test_table';
}
