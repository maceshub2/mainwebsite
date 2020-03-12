<?php

namespace App;

use App\ProductDeal;
use Illuminate\Database\Eloquent\Model;

class DealOnProduct extends Model
{
	protected $connection='mysql';
	protected $fillable=[
		'product_id','deal_id','status','price_type','price'
	];

	public function getDealNameAttribute()
	{
		$deal=ProductDeal::find($this->deal_id);
		if($deal){
			return $deal->name;
		}
		return '';
	}

}
