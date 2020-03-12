<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\DealOnProduct;
use App\ProductDeal;
use App\AdditionalPrice;

class SearchController extends Controller
{
	public $setting;

	function __construct(){
		$this->setting=AdditionalPrice::find(1);
	}
	
	/* Main Search controller for route convention like */
	public function index(Request $request){
		$data=array();

		$data=Product::
		Where('company','Like',$request->maker_id)
		->where('model','Like',$request->model_no)
		->Where('type','Like',$request->veh_type)
		->Where('steering','Like',$request->steering)
		->Where('fuel_type','Like','%'.$request->fuel_type.'%')
		->Where('transmission','Like',$request->transmission)
		->Where('drive_type','Like',$request->drive_type)
		->WhereBetween('engine_cc',[intval($request->engine_capacity_from),intval($request->engine_capacity_to)])
		->orderby('id','desc')
		->get();

		// dd($request->all());
            // Year filter 
		if(isset($request->year_from)||isset($request->year_to)){
			$data=$this->year_filter($data,$request->year_from,$request->year_to);
		}
		if(isset($request->price_from)||isset($request->price_to)){
			$data=$this->price_filter($data,$request->price_from,$request->price_to);
			$result=array();
			// foreach ($data as $value) {
			// 	$result[]=$this->price_calculate($value);
			// }
			// dd($result);
		}

		$form=$request->all();
		return view('product_list',compact(['data','form']));
	}

	/*Show Product at details page*/
	public function showProduct($ref_no){
		$product=Product::where('ref_no',$ref_no)->first();
		if(!$product){
			abort(403,'Unautherized Route');
		}
		$setting=AdditionalPrice::find(1);
		return view('product_detail',compact(['product','setting']));
	}

    // Search of sidebar filter
	public function search_by_company($id){
		$data=Product::where(['company'=>$id])
		->Where('status','=',1)
		->get();

		return view('product_list',compact('data'));
	}
	/*Search by stock location*/
	public function search_by_stock($id){
		$data=Product::where(['stock_location'=>$id])
		->Where('status','=',1)
		->get();

		return view('product_list',compact('data'));
	}
	/*Search byv type of vehicle*/
	public function search_by_type($id){
		$data=Product::where(['type'=>$id])
		->Where('status','=',1)
		->get();
		return view('product_list',compact('data'));
	}
	/*Search by price of vehicle*/
	public function search_by_price($min,$max){
		$data=Product::WhereBetween('total_price',[intval($min),intval($max)])
		->Where('status','=',1)
		->get();

		return view('product_list',compact('data'));
	}
	/*Search by transmission*/
	public function search_by_transmission($name){
		$data=Product::where('transmission','Like',$name)
		->where('status',1)->get();
		return view('product_list',compact('data'));
	}
	/*Search by Steering*/
	public function search_by_steering($name){
		$data=Product::where('steering','Like',$name)
		->where('status',1)->get();

		return view('product_list',compact('data'));
	}
	/*Search by fuel type*/
	public function search_by_fuel($name){
		$data=Product::where('fuel_type','Like',$name)
		->where('status',1)->get();

		return view('product_list',compact('data'));	
	}
	/*Search by registeration year*/
	public function search_by_year($from){
		$data=$this->year_filter(Product::all(),$from,now()->format('Y'));

		return view('product_list',compact('data'));
	}
	/*Search by section or deals*/
	public function search_by_section($id){
		$deals=DealOnProduct::where('deal_id',$id)->get();
		$data= array();

		if(count($deals)>0){
			foreach ($deals as $key => $item) {
				if($item->status==1){
					$data[]=Product::find($item->product_id);					
				}
			}
			
			$data=array_unique($data);
		}
		return view('product_list',compact('data'));
	}



    // helper function to filter the product's years
	private function year_filter($input,$from,$to){
		$output=array();
		foreach ($input as $item){
			if( $item->year_from >= $from && $item->year_to <= $to){
				$output[]=$item;
			}
		}
		return $output;
	}
	/*price helper function by adding addtional price*/
	private function price_filter($input,$from,$to){
		$products=array();
		foreach ($input as $row) {
			$additional_price=$this->price_calculate($row);
			if($additional_price>=$from && $additional_price <= $to)
				$products[]=$row;
		}
		return $products;
	}
	private function price_calculate($item){
		if($item->options && $item->options->price_type!=0){
			$additional=$item->options->price_type==1?
			$item->options->price:
			(($item->options->price/100)*$item->total_price);
		}else{
			$additional=$this->setting->type==1?$this->setting->price:(($this->setting->price/100)*$item->total_price);
		}
		return $additional + $item->total_price;
	}
}
