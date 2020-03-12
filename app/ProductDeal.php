<?php

namespace App;

use App\DealOnProduct;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductDeal extends Model
{
	protected $fillable=[
		'name','price','price','status'
	];

	public function getProductsAttribute()
	{
		$data=DealOnProduct::where('deal_id',$this->id)->get();
		$products= array();
		
		if(count($data)>0){
			foreach ($data as $key => $item) {
				if($item->status==1){
					$products[]=Product::find($item->product_id);					
				}
			}
			
			$products=array_unique($products);
		}
		return $products;
		
	}
}
