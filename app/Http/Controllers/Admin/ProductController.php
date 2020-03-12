<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\AdditionalPrice;
use App\DealOnProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
	public function index(){
		$active='dashboard';
		$setting=AdditionalPrice::find(1);

		$data=Product::orderBy('id','desc')->take(50)->get();
		return view('admin.products',compact(['active','data','setting']));
	}

	public function additionalPrice(Request $request){
		try{
			AdditionalPrice::find(1)->update([
				'type' => $request->type,
				'price' => $request->type==1?$request->usd:$request->percent
			]);
			Session::flash('message','Record Has been successfully updated..');
			Session::flash('result',true);
		}catch(\Exception $e){
			Session::flash('message','Something went wrong....');
		}
		return back();
	}
	public function additionalOption(Request $request){
		try{

			$item=DealOnProduct::find($request->id);
			if($item){
				DealOnProduct::where('id',$request->id)->update([
					'deal_id'=> $request->deal_id,
					'product_id' =>$request->product_id,
					'status' => $request->status,
					'price_type' => $request->price_type,
					'price' => $this->getPrice($request)
				]);
			}else{
				DealOnProduct::create([
					'deal_id'=> $request->deal_id,
					'product_id' =>$request->product_id,
					'status' => $request->status,
					'price_type' => $request->price_type,
					'price' => $this->getPrice($request)
				]);
			}
			Session::flash('message','Option has been successfully update....');
			Session::flash('result',true);
		}catch(\Exception $e){
			Session::flash('message','Somehting went wrong plesae try again');
		}return back();
	}

	private function getPrice($request){
		if($request->price_type==0){
			return 0;
		}else if($request->price_type==1){
			return $request->usd;
		}else if($request->price_type==2){
			return $request->percent;
		}else{
			return 0;
		}
	}
	
}
