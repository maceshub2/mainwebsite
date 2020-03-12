<?php

namespace App\Http\Controllers;

use App\ProductDeal;
use App\AdditionalPrice;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index(){
		
		$products=Product::orderBy('id','desc')->take(5)->get();
		$deals=ProductDeal::where('status',1)->get();
		$setting=AdditionalPrice::find(1);

		return view('welcome',compact(['products','deals','setting']));
	}
}
