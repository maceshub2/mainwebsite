<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
	protected $fillable=[
		'product_id','user_name','user_email','user_phone',
		'user_address', 'user_country', 'user_port', 'user_city',
		'status','price'
	]; 

	public function product()
	{
		return $this->belongTo(Product::class,'product_id');
	}

	public function getProductPhotoAttribute(){
		$product=Product::find($this->product_id);
		if($product){
			$photo=$product->photo;
			return $photo?(env('MAIN_APP_URL').''.$photo->path):asset('assets/main/NO_image.png');
		}else{
			return asset('assets/main/NO_image.png');
		}
	}
	public function getProductTitleAttribute(){
		$product=Product::find($this->product_id);
		if($product){
			$title=$product->product_company?$product->product_company->name:'-';
			$title.=' ';
			$title.=$product->product_model?$product->product_model->model:'';
			return $title;		
		}
		else{
			return "- -";
		}
	}
	public function getProductRefNoAttribute(){
		$product=Product::find($this->product_id);
		return $product?$product->ref_no:'----';
	}
}
