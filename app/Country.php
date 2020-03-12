<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //second database connection
	protected $connection='mysql2';
    // remote table from second database
	protected $table='countries';
}
