<?php

namespace App\Http\Controllers;

use App\ProductDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductDealController extends Controller
{
	public function index()
	{
		$active='deals';
		$data=ProductDeal::all();
		return view('admin.deals',compact(['active','data']));
	}

	public function store(Request $request){
		try{
			ProductDeal::create([
				'name' => $request->name,
				'status' => $request->status
			]);
			Session::flash('message','Record has been successfully stored...');
			Session::flash('result',true);
		}catch(\Exception $e){
			Session::flash('messag','Something went wrong please try again...');
		}
		return back();
	}

	public function update(Request $request){
		try{
			ProductDeal::where('id',$request->id)->update([
				'name' => $request->name,
				'status' => $request->status
			]);
			Session::flash('message','Record has been successfully stored...');
			Session::flash('result',true);
		}catch(\Exception $e){
			Session::flash('messag','Something went wrong please try again...');
		}
		return back();
	}
	public function delete(Request $request){
		try{
			ProductDeal::destroy($request->id);
			Session::flash('message','Record has been successfully stored...');
			Session::flash('result',true);
		}catch(\Exception $e){
			Session::flash('messag','Something went wrong please try again...');
		}
		return back();
	}
}
