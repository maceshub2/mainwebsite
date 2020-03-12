<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //second database connection
    protected $connection='mysql2';
    // remote table from second database
    protected $table='statuses';
}
