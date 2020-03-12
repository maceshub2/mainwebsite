<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalPrice extends Model
{
	protected $fillable=[
		'type','price'
	];
}
